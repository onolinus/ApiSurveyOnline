<?php
namespace App\Transformer;

use App\Correspondents as ModelCorrespondents;
use League\Fractal;

class CorrespondentTransformer extends Fractal\TransformerAbstract
{
    public function transform(ModelCorrespondents $user = null)
    {
        if($user === null){
            return [];
        }

        return [
            'name' => $user->name,
            'nip' => $user->nip,
            'role' => $user->role,
            'telephone_number' => $user->telephone_number,
            'handphone_number' => $user->handphone_number,
            'approved_by' => [
                'name' => $user->ApprovedBy->name,
                'nip' => $user->ApprovedBy->nip,
                'role' => $user->ApprovedBy->role,
                'lembaga' => [
                    'id' => $user->ApprovedBy->lembaga->id,
                    'name' => $user->ApprovedBy->lembaga->name,
                    'type' => $user->ApprovedBy->lembaga->type,
                ],
                'puslit' => $user->ApprovedBy->puslit,
                'alamat' => $user->ApprovedBy->alamat,
                'timestamp' => [
                    'created' => $user->ApprovedBy->created_at,
                    'created_string' => $user->ApprovedBy->created_at->toDayDateTimeString(),
                    'updated' => $user->ApprovedBy->updated_at,
                    'updated_string' => $user->ApprovedBy->updated_at->toDayDateTimeString(),
                ]
            ],
            'timestamp' => [
                'created' => $user->created_at,
                'created_string' => $user->created_at->toDayDateTimeString(),
                'updated' => $user->updated_at,
                'updated_string' => $user->updated_at->toDayDateTimeString(),
            ]
        ];
    }
}
