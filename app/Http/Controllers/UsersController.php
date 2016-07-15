<?php

namespace App\Http\Controllers;

use App\RegistrasiToken;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Users;
use Illuminate\Support\Facades\Validator;
use EllipseSynergie\ApiResponse\Contracts\Response;
use App\Transformer\UserTransformer;


class UsersController extends Controller
{
    CONST PER_PAGE = 10;

    private $validator;

    /**
     * @var Response
     */
    private $response;

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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $rows = Users::paginate(self::PER_PAGE);
        if(empty($rows) || count($rows) === 0){
            return response()->json([
                'status' => 'error',
                'message' => trans('errors.data_empty', ['dataname' => 'user'])
            ], 400);
        }
        return $this->response->withPaginator($rows, new UserTransformer);
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
            'type' => 'required|in:admin,correspondent,validator',
            'email' => 'required|max:50|email|unique:users,email',
            'password' => 'required|min:5',
            'registration_token' => 'required|size:32|exists:registrasi_tokens,token,user_id,0'
        ])){
            return $this->response->errorInternalError($this->validator->errors()->all());
        }

        $user = new Users();
        $user->type = $request->type;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();

        if(!$user->save()){
            return $this->response->errorInternalError(trans('errors.data_save', ['dataname' => 'user']));
        }

        $registrasiToken = RegistrasiToken::find($request->registration_token);
        $registrasiToken->user_id = 0;
        $registrasiToken->save();

        if(!$registrasiToken->save()){
            return $this->response->errorInternalError(trans('errors.data_save', ['dataname' => 'registrasi token']));
        }

        return $this->response->setStatusCode(201)->withArray([
            'status' => 'success',
            'message' => trans('success.data_saved', ['dataname' => 'user'])
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Users::find($id);
        if(empty($user) || count($user) === 0){
            return $this->response->errorNotFound(trans('errors.data_not_found', ['dataname' => 'user']));
        }

        return $this->response->withItem($user, new UserTransformer);
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
}
