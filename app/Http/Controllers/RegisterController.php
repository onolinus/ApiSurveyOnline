<?php

namespace App\Http\Controllers;

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

    public function __construct(Response $response)
    {
        $this->response = $response;
    }

    private function getRulesStoreValidation(Request $request){
        $rules = [
            'type' => 'required|in:admin,correspondent,validator,guest',
            'email' => 'required|max:50|email|unique:users,email',
            'password' => 'required|min:5',
            'confirm_password' => 'required|min:5|same:password',
            'registration_token' => 'required|size:6|exists:registrasi_tokens,token,user_id,0'
        ];

        return $rules;
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
