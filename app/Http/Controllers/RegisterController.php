<?php

namespace App\Http\Controllers;

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

    /**
     * @var Response
     */
    protected $response;

    CONST USER_TYPE = 'correspondent';

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

        return $rules;
    }

    private function updateFlagRegistrasiToken(Request $request, $user_id){
        $registrasiToken = RegistrasiTokenModel::find($request->registration_token);
        $registrasiToken->user_id = $user_id;
        $registrasiToken->save();
    }

    private function createNewUser(Request $request){
        $user = new UsersModel();
        $user->type = self::USER_TYPE;
        $user->email = $request->email;
        $user->password = \PluginCommonSurvey\Helper\Hashed\hash_password($request->password, config('app.password_slug'));
        $user->save();

        return $user;
    }

    public function store(Request $request)
    {
        if(!$this->runValidation($request, $this->getRulesStoreValidation($request))){
            return $this->response->errorInternalError($this->validator->errors()->all());
        }

        DB::transaction(function () use ($request) {
            $user = $this->createNewUser($request);
            $this->updateFlagRegistrasiToken($request, $user->id);
        });

        return $this->returnStoreSuccessResponce();
    }
}
