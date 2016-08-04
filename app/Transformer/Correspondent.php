<?php
namespace App\Transformer;

use App\Correspondents as ModelCorrespondents;
use League\Fractal;

class CorrespondentTransformer extends Fractal\TransformerAbstract
{
    public function transform(ModelCorrespondents $user)
    {
        return [
            'name' => $user->name,
            'nip' => $user->nip,
            'role' => $user->role,
            'telephone_number' => $user->telephone_number,
            'handhone_number' => $user->handhone_number,
            'approved_by' => [
                'name' => $user->ApprovedBy->name,
                'nip' => $user->ApprovedBy->nip,
                'role' => $user->ApprovedBy->role,
                'lembaga' => $user->ApprovedBy->lembaga,
                'puslit' => $user->ApprovedBy->puslit,
                'puslit' => $user->ApprovedBy->puslit,
                'alamat' => $user->ApprovedBy->alamat,
                'timestamp' => [
                    'created' => $user->ApprovedBy->created_at,
                    'updated' => $user->ApprovedBy->updated_at,
                ]
            ],
            'timestamp' => [
                'created' => $user->created_at, //$user->created_at->toDateTimeString()
                'updated' => $user->updated_at, //$user->updated_at->toDateTimeString()
            ]
        ];
    }
}