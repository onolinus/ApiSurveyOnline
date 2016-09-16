<?php
namespace App\Transformer;

use App\Answers as ModelAnswers;
use Illuminate\Support\Facades\Request;
use League\Fractal;

class Answers extends Fractal\TransformerAbstract
{
    public function transform(ModelAnswers $answers)
    {
        $request = Request::capture();
        $includes = explode(',', $request->include);

        return [
            'id' => $answers->id,
            'status' => $answers->status,
            'correspondent' => [
                'id' => $answers->id_correspondent,
            ],
            'timestamp' => [
                'created' => $answers->created_at,
                'created_string' => $answers->created_at->toDayDateTimeString(),
                'updated' => $answers->updated_at,
                'updated_string' => $answers->updated_at->toDayDateTimeString(),
            ],
            'links' => [
                'self' => route('user.{user_id}.survey.show', [$answers->id_correspondent])
            ],
            'relationships' => [
                'correspondent' => $this->getCorrespondent($includes, $answers),
            ]
        ];
    }

    private function getCorrespondent($includes, ModelAnswers $answers)
    {
        $correspondent = $answers->Correspondents;

        if(in_array('correspondent', $includes) && $correspondent !== null){
            return [
                'user_id' => $correspondent->user_id,
                'name' => $correspondent->name,
                'nip' => $correspondent->nip,
                'role' => $correspondent->role,
                'telephone_number' => $correspondent->telephone_number,
                'handphone_number' => $correspondent->handphone_number,
                'timestamp' => [
                    'created' => $correspondent->created_at,
                    'created_string' => $correspondent->created_at->toDayDateTimeString(),
                    'updated' => $correspondent->updated_at,
                    'updated_string' => $correspondent->updated_at->toDayDateTimeString(),
                ],
            ];
        }

        return [
            'links' => [
                'related' => route('admin.correspondent.show', [$answers->id_correspondent])
            ]
        ];
    }
}