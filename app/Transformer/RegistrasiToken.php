<?php
namespace App\Transformer;

use App\RegistrasiToken as ModelRegistrasiToken;
use League\Fractal;

class RegistrasiToken extends Fractal\TransformerAbstract
{
    public function transform(ModelRegistrasiToken $token)
    {
        return [
            'token' => $token->token,
            'user_id' => $token->user_id,
        ];
    }
}