<?php
namespace App\Transformer;

use App\ApprovedBy as ModelApprovedBy;
use League\Fractal;
use Illuminate\Http\Request;

class ApprovedsByTransformer extends Fractal\TransformerAbstract
{
    public function transform(ModelApprovedBy $approvedBy = null)
    {
        if($approvedBy === null){
            return [];
        }

        $request = Request::capture();
        $includes = explode(',', $request->include);

        return [
            'correspondent_id_approved' => $approvedBy->correspondent_id_approved,
            'name' => $approvedBy->name,
            'nip' => $approvedBy->nip,
            'role' => $approvedBy->role,
            'lembaga' => $this->getLembaga($includes, $approvedBy),
            'puslit' => $approvedBy->puslit,
            'alamat' => $approvedBy->alamat,
            'timestamp' => [
                'created' => $approvedBy->created_at,
                'created_string' => $approvedBy->created_at->toDayDateTimeString(),
                'updated' => $approvedBy->updated_at,
                'updated_string' => $approvedBy->updated_at->toDayDateTimeString(),
            ],
            'links' => [
                'self' => route('admin.approvedby.show', [$approvedBy->correspondent_id_approved])
            ],
            'relationships' => [
                'lembaga' => [
                    'links' => [
                        'related' => route('lembaga.show', [$approvedBy->id_lembaga])
                    ]
                ],
            ]
        ];
    }

    private function getLembaga($includes, ModelApprovedBy $approvedBy){
        if(in_array('lembaga', $includes) && $approvedBy->lembaga !== null){
            return [
                'id' => $approvedBy->lembaga->id,
                'name' => $approvedBy->lembaga->name,
                'type' => $approvedBy->lembaga->type,
            ];
        }

        return $approvedBy->id_lembaga;
    }
}
