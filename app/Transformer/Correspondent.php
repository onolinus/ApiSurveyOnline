<?php
namespace App\Transformer;

use App\Correspondents as ModelCorrespondents;
use App\Users as ModelUsers;
use League\Fractal;

class CorrespondentTransformer extends Fractal\TransformerAbstract
{
    public function transform(ModelUsers $user = null)
    {
        if($user === null){
            return [];
        }

        if($user->correspondents === null){
            return [];
        }

        $correspondents = $user->correspondents;

        return [
            'email' => $user->email,
            'name' => $correspondents->name,
            'nip' => $correspondents->nip,
            'role' => $correspondents->role,
            'telephone_number' => $correspondents->telephone_number,
            'handphone_number' => $correspondents->handphone_number,
            'approved_by' => [
                'name' => $correspondents->ApprovedBy->name,
                'nip' => $correspondents->ApprovedBy->nip,
                'role' => $correspondents->ApprovedBy->role,
                'lembaga' => [
                    'id' => $correspondents->ApprovedBy->lembaga->id,
                    'name' => $correspondents->ApprovedBy->lembaga->name,
                    'type' => $correspondents->ApprovedBy->lembaga->type,
                ],
                'puslit' => $correspondents->ApprovedBy->puslit,
                'alamat' => $correspondents->ApprovedBy->alamat,
                'timestamp' => [
                    'created' => $correspondents->ApprovedBy->created_at,
                    'created_string' => $correspondents->ApprovedBy->created_at->toDayDateTimeString(),
                    'updated' => $correspondents->ApprovedBy->updated_at,
                    'updated_string' => $correspondents->ApprovedBy->updated_at->toDayDateTimeString(),
                ]
            ],
            'timestamp' => [
                'created' => $correspondents->created_at,
                'created_string' => $correspondents->created_at->toDayDateTimeString(),
                'updated' => $correspondents->updated_at,
                'updated_string' => $correspondents->updated_at->toDayDateTimeString(),
            ]
        ];
    }
}
