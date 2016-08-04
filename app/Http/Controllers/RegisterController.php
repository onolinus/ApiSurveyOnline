<?php

namespace App\Http\Controllers;

use App\AuthToken;
use App\AuthTrait;
use app\Libraries\Structure\SessionToken;
use App\RegistrasiToken as RegistrasiTokenModel;
use App\Users as UsersModel;
use App\UsersTrait;
use Illuminate\Http\Request;
use EllipseSynergie\ApiResponse\Contracts\Response;
use App\Http\Requests;
use DB;

class RegisterController extends Controller
{
    use UsersTrait;

    use AuthTrait;

    /**
     * @var Response
     */
    protected $response;

    CONST USER_TYPE = 'correspondent';

    CONST GENERATE_TOKEN_AFTER_REGISTER = true;

    /**
     * @var UsersModel
     */
    private $user;

    public function __construct(Response $response)
    {
        $this->response = $response;
    }

    private function getRulesStoreValidation(Request $request){
        $rules = [
            'email' => 'required|max:50|email|unique:users,email',
            'password' => 'required|min:5',
            'confirm_password' => 'required|min:5|same:password',
            'registration_token' => 'required|size:6|exists:registrasi_tokens,token,user_id,0'
        ];

        if(self::GENERATE_TOKEN_AFTER_REGISTER){
            $rules['client_id'] = 'required';
            $rules['secret_code'] = 'required';
        }

        return $rules;
    }

    private function updateFlagRegistrasiToken(Request $request, $user_id){
        $registrasiToken = RegistrasiTokenModel::find($request->registration_token);
        $registrasiToken->user_id = $user_id;
        $registrasiToken->save();
    }

    private function createNewUser(Request $request){
        $this->user = new UsersModel();
        $this->user->type = self::USER_TYPE;
        $this->user->email = $request->email;
        $this->user->password = \PluginCommonSurvey\Helper\Hashed\hash_password($request->password, config('app.password_slug'));
        $this->user->save();

        return $this->user;
    }

    private function generateTokenAfterRegister(Request $request){
        if(!$this->checkApiClientAndSecretCode($request)){
            return $this->getInvalidApiClientAndSecretCodeResponse();
        }

        try {
            /** @var SessionToken $sessionToken */
            $sessionToken = AuthToken::getFreshInstance($this->user->id)->getSessionToken();
        }catch(\Exception $e){
            return $this->response->errorInternalError($e->getMessage());
        }


        return $this->getSuccessStoreResponse($sessionToken);
    }

    public function store(Request $request)
    {
        if(!$this->runValidation($request, $this->getRulesStoreValidation($request))){
            return $this->response->errorInternalError($this->validator->errors()->all());
        }

        DB::transaction(function () use ($request) {
            $this->user = $this->createNewUser($request);
            $this->updateFlagRegistrasiToken($request, $this->user->id);
        });

        if(self::GENERATE_TOKEN_AFTER_REGISTER === false){
            return $this->returnStoreSuccessResponse();
        }

        // generate token after register
        return $this->generateTokenAfterRegister($request);
    }
}
