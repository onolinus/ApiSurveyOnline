<?php
namespace App\Transformer;

use App\Correspondents as ModelCorrespondents;
use App\Correspondents;
use App\Http\Middleware\AdminPrivilegeMiddleware;
use app\Libraries\SessionTokenAccessor;
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

        $result = [
            'user_id' => $user->id,
            'email' => $user->email,
            'relationships' => [
                'user' => [
                    'links' => [
                        'related' => route('user.show', [$user->id])
                    ]
                ]
            ]
        ];


        if($user->correspondents === null){
            return $result;
        }

        $correspondent = $user->correspondents;

        $request = Request::capture();
        $includes = explode(',', $request->include);

        $result['name'] = $correspondent->name;
        $result['nip'] = $correspondent->nip;
        $result['role'] = $correspondent->role;
        $result['telephone_number'] = $correspondent->telephone_number;
        $result['handphone_number'] = $correspondent->handphone_number;
        $result['approved_by'] = $this->getApproved_by($includes, $correspondent);
        $result['timestamp'] = [
            'created' => $correspondent->created_at,
            'created_string' => $correspondent->created_at->toDayDateTimeString(),
            'updated' => $correspondent->updated_at,
            'updated_string' => $correspondent->updated_at->toDayDateTimeString(),
        ];
        $result['links'] = [
            'self' => route('admin.correspondent.show', [$correspondent->user_id])
        ];
        $result['relationships']['approved_by'] = [
            'links' => [
                'related' => route('admin.approvedby.show', [$correspondent->user_id])
            ]
        ];

        $this->getAnswersStatus($includes, $correspondent, $result);

        return $result;
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

    private function getAnswersStatus($includes, Correspondents $correspondents, &$result)
    {
        if(in_array('surveystatus', $includes) && $correspondents !== null && SessionTokenAccessor::getInstance()->getSessionUserType() === AdminPrivilegeMiddleware::USER_TYPE_ALLOWED) {
            /** @var Answers $answers */
            $answers = $correspondents->Answers;
            if(!is_null($answers)) {
                $result ['survey'] = [
                    'id' => $answers->id,
                    'status' => $answers->status,
                    'links' => [
                        'detail' => route('admin.survey.show', [$answers->id]),
                        'approve' => route('survey.{id_answer}.approve', [$answers->id]),
                        'reject' => route('survey.{id_answer}.reject', [$answers->id])
                    ]
                ];
            }
        }
    }
}