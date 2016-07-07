<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Users;

use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    private $validator;

    private function validationRules($event){
        $rules = [
            'type' => 'in:admin,correspondent,validator',
            'email' => 'max:50|unique:users,email',
            'password' => 'min:5',
        ];

        if($event === 'store'){
            foreach($rules as &$rule){
                $rule = 'required|' . $rule;
            }
        }

        return $rules;
    }

    private function runValidation($request, $event){
        $this->validator = Validator::make($request->all(), $this->validationRules($event));
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
        if(!$this->runValidation($request, 'store')){
            return response()->json([
                'status' => 'errors',
                'errors' => $this->validator->errors()->all()
            ], 400);
        }

        $user = new Users();
        $user->type = $request->type;
        $user->email = $request->email;
        $user->password = $request->password;

        if($user->save()){
            return response()->json([
                'status' => 'success',
                'message' => trans('success.data_saved', ['dataname' => 'user'])
            ], 201);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Users::where('id', $id)->get();
        if(empty($user) || count($user) === 0){
            return response()->json([
                'status' => 'error',
                'message' => trans('errors.data_not_found', ['dataname' => 'user'])
            ], 400);
        }
        return response()->json($user);
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
        if(!$this->runValidation($request, 'update')){
            return response()->json([
                'status' => 'errors',
                'errors' => $this->validator->errors()->all()
            ], 400);
        }

        /** @var Users $user */
        $user = Users::find($id);
        if(empty($user) || count($user) === 0){
            return response()->json([
                'status' => 'error',
                'message' => trans('errors.data_not_found', ['dataname' => 'user'])
            ], 404);
        }

        $user->type = $request->type;
        $user->email = $request->email;
        $user->password = $request->password;

        if($user->save()){
            return response()->json([
                'status' => 'success',
                'message' => trans('success.data_updated', ['dataname' => 'user'])
            ], 201);
        }
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
            return response()->json([
                'status' => 'error',
                'message' => trans('errors.data_not_found', ['dataname' => 'user'])
            ], 404);
        }

        if($user->delete()){
            return response()->json([
                'status' => 'success',
                'message' => trans('success.data_deleted', ['dataname' => 'user'])
            ], 200);
        }
    }
}
