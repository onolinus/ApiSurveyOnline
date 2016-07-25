<?php
namespace App\Transformer;

use League\Fractal;

class TokenTransformer extends Fractal\TransformerAbstract
{
    public function transform($redisToken)
    {
        return [
            'id' => $user->id,
            'type' => $user->type,
            'email' => $user->email,
            'timestamp' => [
                'created' => $user->created_at, //$user->created_at->toDateTimeString()
                'updated' => $user->updated_at, //$user->updated_at->toDateTimeString()
            ]
        ];
    }
}