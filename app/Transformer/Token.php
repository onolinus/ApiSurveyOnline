<?php
namespace App\Transformer;

use app\Libraries\Structure\SessionToken;
use League\Fractal;

class TokenTransformer extends Fractal\TransformerAbstract
{
    public function transform(SessionToken $sessionToken)
    {
        return [
            'access_token' => $sessionToken->getAttribute('access_token'),
            'user_type' => $sessionToken->getAttribute('user_type'),
            'token_type' => $sessionToken->getAttribute('token_type'),
            'expires_in' => $sessionToken->getAttribute('expires_in'),
        ];
    }
}