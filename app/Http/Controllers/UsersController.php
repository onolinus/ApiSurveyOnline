<?php

namespace App\Http\Controllers;

use App\RegistrasiToken;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Users;
use Illuminate\Support\Facades\Validator;
use EllipseSynergie\ApiResponse\Contracts\Response;
use App\Transformer\UserTransformer;
use DB;

class UsersController extends BaseController
{
    private $validator;

    private function runValidation($request, $rules){
        $this->validator = Validator::make($request->all(), $rules);
        if($this->validator->fails()){
            return false;
        }

        return true;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!$this->runValidation($request, [
            'type' => 'required|in:admin,correspondent,validator,guest',
            'email' => 'required|max:50|email|unique:users,email',
            'password' => 'required|min:5',
            'registration_token' => 'required|size:6|exists:registrasi_tokens,token,user_id,0'
        ])){
            return $this->response->errorInternalError($this->validator->errors()->all());
        }

        DB::transaction(function () use ($request) {
            $user = new Users();
            $user->type = $request->type;
            $user->email = $request->email;
            $user->password = \PluginCommonSurvey\Helper\Hashed\hash_password($request->password, config('app.password_slug'));
            $user->save();

            if (!$user->save()) {
                return $this->response->errorInternalError(trans('errors.data_save', ['dataname' => 'user']));
            }

            $registrasiToken = RegistrasiToken::find($request->registration_token);
            $registrasiToken->user_id = $user->id;
            $registrasiToken->save();

            if (!$registrasiToken->save()) {
                return $this->response->errorInternalError(trans('errors.data_save', ['dataname' => 'registrasi token']));
            }
        });

        return $this->response->setStatusCode(201)->withArray([
            'status' => 'success',
            'message' => trans('success.data_saved', ['dataname' => 'user'])
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(!$this->runValidation($request, [
            'type' => 'in:admin,correspondent,validator',
            'email' => 'max:50|email|unique:users,email',
            'password' => 'min:5'
        ])){
            return $this->response->errorInternalError($this->validator->errors()->all());
        }

        /** @var Users $user */
        $user = Users::find($id);
        if(empty($user) || count($user) === 0){
            return $this->response->errorNotFound(trans('errors.data_not_found', ['dataname' => 'user']));
        }

        $user->type = $request->type ? $request->type : $user->type;
        $user->email = $request->email ? $request->email : $user->email;
        $user->password = $request->password ? $request->password : $user->password;

        if(!$user->save()){
            return $this->response->errorInternalError(trans('errors.data_save', ['dataname' => 'user']));
        }

        return $this->response->setStatusCode(201)->withArray([
            'status' => 'success',
            'message' => trans('success.data_updated', ['dataname' => 'user'])
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /** @var Users $user */
        $user = Users::find($id);
        if(empty($user) || count($user) === 0){
            return $this->response->errorNotFound(trans('errors.data_not_found', ['dataname' => 'user']));
        }

        if($user->delete()){
            return $this->response->setStatusCode(200)->withArray([
                'status' => 'success',
                'message' => trans('success.data_deleted', ['dataname' => 'user'])
            ]);
        }
    }

    protected function getModelName()
    {
        return 'Users';
    }

    protected function getModelLabel()
    {
        return 'user';
    }

    /**
     * @return \League\Fractal\TransformerAbstract
     */
    protected function getTransformer()
    {
        return new UserTransformer();
    }
}
