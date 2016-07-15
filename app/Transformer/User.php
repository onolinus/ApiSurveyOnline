<?php
namespace App\Transformer;

use App\Users as ModelUsers;
use League\Fractal;

class UserTransformer extends Fractal\TransformerAbstract
{
    public function transform(ModelUsers $user)
    {
        return [
            'id' => $user->id,
            'type' => $user->type,
            'email' => $user->email,
            'timestamp' => [
                'created' => $user->created_at->toDateTimeString(),
                'updated' => $user->updated_at->toDateTimeString()
            ]
        ];
    }
}