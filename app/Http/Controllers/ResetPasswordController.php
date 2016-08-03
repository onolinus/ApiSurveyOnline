<?php

namespace App\Http\Controllers;

use App\RegistrasiToken as RegistrasiTokenModel;
use App\Users as UsersModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use EllipseSynergie\ApiResponse\Contracts\Response;
use App\Transformer\UserTransformer;
use App\Http\Requests;

class ResetPasswordController extends Controller
{
    /**
     * @var Response
     */
    protected $response;

    /**
     * @var Validator
     */
    private $validator;

    public function __construct(Response $response)
    {
        $this->response = $response;
    }

    private function runValidation($request, $rules){
        $this->validator = Validator::make($request->all(), $rules);
        if($this->validator->fails()){
            return false;
        }

        return true;
    }

    public function update(Request $request){
        if(!$this->runValidation($request, [
            'email' => 'required|max:50|email|exists:users,email',
            'registrasi_tokens' => 'required|size:6|exists:registrasi_tokens,token,user_id,!0',
            'newpassword' => 'required|min:5',
            'confirm_newpassword' => 'required|min:5|same:newpassword',
        ])){
            return $this->response->errorInternalError($this->validator->errors()->all());
        }

        $user = UsersModel::where('email', $request->email)->first();

        if($user->registrasitoken->token != $request->registrasi_tokens){
            return $this->response->errorWrongArgs(trans('This token does not belong to you'));
        }

        $user->password = \PluginCommonSurvey\Helper\Hashed\hash_password($request->newpassword);
        if (!$user->save()) {
            return $this->response->errorInternalError(trans('errors.data_save', ['dataname' => 'user']));
        }

        return $this->response->setStatusCode(200)->withArray([
            'status' => 'success',
            'message' => trans('your password successfully updated')
        ]);
    }
}
