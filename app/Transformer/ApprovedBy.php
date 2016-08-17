<?php
namespace App\Transformer;

use App\ApprovedBy as ModelApprovedBy;
use League\Fractal;

class ApprovedByTransformer extends Fractal\TransformerAbstract
{
    public function transform(ModelApprovedBy $approvedBy = null)
    {
        if($approvedBy === null){
            return [];
        }

        return [
            'name' => $approvedBy->name,
            'nip' => $approvedBy->nip,
            'role' => $approvedBy->role,
            'lembaga' => [
                'id' => $approvedBy->lembaga->id,
                'name' => $approvedBy->lembaga->name,
                'type' => $approvedBy->lembaga->type,
            ],
            'puslit' => $approvedBy->puslit,
            'alamat' => $approvedBy->alamat,
            'timestamp' => [
                'created' => $approvedBy->created_at,
                'created_string' => $approvedBy->created_at->toDayDateTimeString(),
                'updated' => $approvedBy->updated_at,
                'updated_string' => $approvedBy->updated_at->toDayDateTimeString(),
            ]
        ];
    }
}
