<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\TraitSessionToken;
use App\TraitUsers;
use App\TraitValidate;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Users;
use App\Transformer\UserTransformer;
use DB;
use PluginCommonSurvey\Libraries\Codes;

class UsersController extends BaseController
{
    use TraitSessionToken;

    use TraitValidate;

    use TraitUsers;

    private function getRulesStoreValidation(Request $request){
        $rules = [
            'type' => 'required|in:admin,correspondent,validator,guest',
            'email' => 'required|max:50|email|unique:users,email',
            'password' => 'required|min:5',
            'confirm_password' => 'required|min:5|same:password',
        ];

        if($request->type === 'correspondent'){
            $rules['registration_token'] = 'required|size:6|exists:registrasi_tokens,token,user_id,0';
        }

        return $rules;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!$this->runValidation($request, $this->getRulesStoreValidation($request))){
            return $this->response->errorInternalError($this->validator->errors()->all());
        }

        DB::transaction(function () use ($request) {
            $user = $this->createNewUser($request);
            $this->updateFlagRegistrasiToken($request, $user->id);
        });

        return $this->returnStoreSuccessResponse();
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
        $user->password = \PluginCommonSurvey\Helper\Hashed\hash_password($user->password);
        $user->save();

        return $this->response->setStatusCode(201)->withArray([
            'code' => Codes::SUCCESS,
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

        $user->delete();
        return $this->response->setStatusCode(200)->withArray([
            'code' => Codes::SUCCESS,
            'message' => trans('success.data_deleted', ['dataname' => 'user'])
        ]);
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
