<?php
namespace App\Transformer;

use App\Correspondents as ModelCorrespondents;
use App\Users as ModelUsers;
use League\Fractal;
use Illuminate\Http\Request;

class CorrespondentsTransformer extends Fractal\TransformerAbstract
{
    public function transform(ModelUsers $user = null)
    {
        if($user === null){
            return [];
        }

        if($user->correspondents === null){
            return [];
        }

        $correspondent = $user->correspondents;

        $request = Request::capture();
        $includes = explode(',', $request->include);

        return [
            'user_id' => $correspondent->user_id,
            'email' => $user->email,
            'name' => $correspondent->name,
            'nip' => $correspondent->nip,
            'role' => $correspondent->role,
            'telephone_number' => $correspondent->telephone_number,
            'handphone_number' => $correspondent->handphone_number,
            'approved_by' => $this->getApproved_by($includes, $correspondent),
            'timestamp' => [
                'created' => $correspondent->created_at,
                'created_string' => $correspondent->created_at->toDayDateTimeString(),
                'updated' => $correspondent->updated_at,
                'updated_string' => $correspondent->updated_at->toDayDateTimeString(),
            ],
            'links' => [
                'self' => route('admin.correspondent.show', [$correspondent->user_id])
            ],
            'relationships' => [
                'user' => [
                    'links' => [
                        'related' => route('user.show', [$correspondent->user_id])
                    ]
                ],
                'approved_by' => [
                    'links' => [
                        'related' => route('admin.correspondent.show', [$correspondent->user_id])
                    ]
                ]
            ]
        ];
    }


    private function getApproved_by($includes, ModelCorrespondents $correspondent){
        if(in_array('approved_by', $includes) && $correspondent->ApprovedBy !== null){
            return [
                'name' => $correspondent->ApprovedBy->name,
                'nip' => $correspondent->ApprovedBy->nip,
                'role' => $correspondent->ApprovedBy->role,
                'lembaga' => [
                    'id' => $correspondent->ApprovedBy->lembaga->id,
                    'name' => $correspondent->ApprovedBy->lembaga->name,
                    'type' => $correspondent->ApprovedBy->lembaga->type,
                ],
                'puslit' => $correspondent->ApprovedBy->puslit,
                'alamat' => $correspondent->ApprovedBy->alamat,
                'timestamp' => [
                    'created' => $correspondent->ApprovedBy->created_at,
                    'created_string' => $correspondent->ApprovedBy->created_at->toDayDateTimeString(),
                    'updated' => $correspondent->ApprovedBy->updated_at,
                    'updated_string' => $correspondent->ApprovedBy->updated_at->toDayDateTimeString(),
                ]
            ];
        }

        return $correspondent->user_id;
    }
}