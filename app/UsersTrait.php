<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

trait UsersTrait
{

    /**
     * @var Validator
     */
    private $validator;

    private function runValidation($request, $rules){
        $this->validator = Validator::make($request->all(), $rules);
        if($this->validator->fails()){
            return false;
        }

        return true;
    }

    private function updateFlagRegistrasiToken(Request $request, $user_id){
        if($request->type === 'correspondent') {
            $registrasiToken = RegistrasiToken::find($request->registration_token);
            $registrasiToken->user_id = $user_id;
            $registrasiToken->save();
        }
    }

    private function createNewUser(Request $request){
        $user = new Users();
        $user->type = $request->type;
        $user->email = $request->email;
        $user->password = \PluginCommonSurvey\Helper\Hashed\hash_password($request->password, config('app.password_slug'));
        $user->save();

        return $user;
    }

    private function returnStoreSuccessResponce(){
        return $this->response->setStatusCode(201)->withArray([
            'status' => 'success',
            'message' => trans('success.data_saved', ['dataname' => 'user'])
        ]);
    }
}
