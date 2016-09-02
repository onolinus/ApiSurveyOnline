<?php
namespace App\Transformer;

use App\Answers as ModelAnswers;
use App\Answers1 as ModelAnswers1;
use App\Answers2 as ModelAnswers2;
use App\Answers3 as ModelAnswers3;
use App\Answers4 as ModelAnswers4;
use App\Answers5 as ModelAnswers5;
use App\Answers6 as ModelAnswers6;
use App\Answers7 as ModelAnswers7;
use App\Answers8 as ModelAnswers8;
use App\Answers9a as ModelAnswers9a;
use App\Answers9b as ModelAnswers9b;
use App\Answers9c as ModelAnswers9c;
use App\Answers10 as ModelAnswers10;
use App\Answers11 as ModelAnswers11;
use App\Answers12 as ModelAnswers12;
use App\Answers13 as ModelAnswers13;
use App\Answers14 as ModelAnswers14;
use App\Answers15a as ModelAnswers15a;
use App\Answers15b as ModelAnswers15b;
use App\Answers16a as ModelAnswers16a;
use App\Answers16b as ModelAnswers16b;
use App\Answers17 as ModelAnswers17;
use App\Answers18 as ModelAnswers18;
use Illuminate\Database\Eloquent\Collection;
use League\Fractal;

class AnswerDetail extends Fractal\TransformerAbstract
{
    public function transform(ModelAnswers $answers)
    {
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
                'self' => route('validator.survey.show', [$answers->id_correspondent])
            ],
            'detail' => $this->getDetail($answers),
            'relationships' => [
                'correspondent' => [
                    'links' => [
                        'related' => route('admin.correspondent.show', [$answers->id_correspondent])
                    ]
                ],
            ]
        ];
    }

    private function getDetail(ModelAnswers $answers){
        $detail = [];

        $this->setAnswer1($detail, $answers->Answers1);
        $this->setAnswer2($detail, $answers->Answers2);
        $this->setAnswer3($detail, $answers->Answers3);
        $this->setAnswer4($detail, $answers->Answers4);
        $this->setAnswer5($detail, $answers->Answers5);
        $this->setAnswer6($detail, $answers->Answers6);
        $this->setAnswer7($detail, $answers->Answers7);
        $this->setAnswer8($detail, $answers->Answers8);
        $this->setAnswer9a($detail, $answers->Answers9a);
        $this->setAnswer9b($detail, $answers->Answers9b);
        $this->setAnswer9c($detail, $answers->Answers9c);
        $this->setAnswer10($detail, $answers->Answers10);
        $this->setAnswer11($detail, $answers->Answers11);
        $this->setAnswer12($detail, $answers->Answers12);
        $this->setAnswer13($detail, $answers->Answers13);
        $this->setAnswer14($detail, $answers->Answers14);
        $this->setAnswer15a($detail, $answers->Answers15a);
        $this->setAnswer15b($detail, $answers->Answers15b);
        $this->setAnswer16a($detail, $answers->Answers16a);
        $this->setAnswer16b($detail, $answers->Answers16b);
        $this->setAnswer17($detail, $answers->Answers17);
        $this->setAnswer18($detail, $answers->Answers18);

        return $detail;
    }

    private function setAnswer1(&$detail, ModelAnswers1 $answers1){
        $detail['answer1'] = [
            'status' => $answers1->status,
            'comment' => $answers1->status_comment,
            'data' => [
                'total' => $answers1->total,
                'percentage' => $answers1->percentage,
            ],
            'timestamp' => [
                'created' => $answers1->created_at,
                'created_string' => $answers1->created_at->toDayDateTimeString(),
                'updated' => $answers1->updated_at,
                'updated_string' => $answers1->updated_at->toDayDateTimeString(),
            ],
        ];

        return $this;
    }

    private function setAnswer2(&$detail, ModelAnswers2 $answers2){
        $detail['answer2'] = [
            'status' => $answers2->status,
            'comment' => $answers2->status_comment,
            'data' => [
                'jumlah' => $answers2->jumlah,
            ],
            'timestamp' => [
                'created' => $answers2->created_at,
                'created_string' => $answers2->created_at->toDayDateTimeString(),
                'updated' => $answers2->updated_at,
                'updated_string' => $answers2->updated_at->toDayDateTimeString(),
            ],
        ];

        return $this;
    }

    private function setAnswer3(&$detail, ModelAnswers3 $answers3){
        $detail['answer3'] = [
            'status' => $answers3->status,
            'comment' => $answers3->status_comment,
            'data' => [

            ],
            'timestamp' => [
                'created' => $answers3->created_at,
                'created_string' => $answers3->created_at->toDayDateTimeString(),
                'updated' => $answers3->updated_at,
                'updated_string' => $answers3->updated_at->toDayDateTimeString(),
            ],
        ];

        return $this;
    }

    private function setAnswer4(&$detail, ModelAnswers4 $answers4){
        $detail['answer4'] = [
            'status' => $answers4->status,
            'comment' => $answers4->status_comment,
            'data' => [

            ],
            'timestamp' => [
                'created' => $answers4->created_at,
                'created_string' => $answers4->created_at->toDayDateTimeString(),
                'updated' => $answers4->updated_at,
                'updated_string' => $answers4->updated_at->toDayDateTimeString(),
            ],
        ];

        return $this;
    }

    private function setAnswer5(&$detail, Collection $answers5){
//        $detail['answer5'] = [
//            'status' => $answers5->status,
//            'comment' => $answers5->status_comment,
//            'data' => [
//
//            ],
//            'timestamp' => [
//                'created' => $answers5->created_at,
//                'created_string' => $answers5->created_at->toDayDateTimeString(),
//                'updated' => $answers5->updated_at,
//                'updated_string' => $answers5->updated_at->toDayDateTimeString(),
//            ],
//        ];

        return $this;
    }

    private function setAnswer6(&$detail, Collection $answers6){
//        $detail['answer6'] = [
//            'status' => $answers6->status,
//            'comment' => $answers6->status_comment,
//            'data' => [
//
//            ],
//            'timestamp' => [
//                'created' => $answers6->created_at,
//                'created_string' => $answers6->created_at->toDayDateTimeString(),
//                'updated' => $answers6->updated_at,
//                'updated_string' => $answers6->updated_at->toDayDateTimeString(),
//            ],
//        ];

        return $this;
    }

    private function setAnswer7(&$detail, ModelAnswers7 $answers7){
        $detail['answer7'] = [
            'status' => $answers7->status,
            'comment' => $answers7->status_comment,
            'data' => [

            ],
            'timestamp' => [
                'created' => $answers7->created_at,
                'created_string' => $answers7->created_at->toDayDateTimeString(),
                'updated' => $answers7->updated_at,
                'updated_string' => $answers7->updated_at->toDayDateTimeString(),
            ],
        ];

        return $this;
    }

    private function setAnswer8(&$detail, Collection $answers8){
//        $detail['answer8'] = [
//            'status' => $answers8->status,
//            'comment' => $answers8->status_comment,
//            'data' => [
//
//            ],
//            'timestamp' => [
//                'created' => $answers8->created_at,
//                'created_string' => $answers8->created_at->toDayDateTimeString(),
//                'updated' => $answers8->updated_at,
//                'updated_string' => $answers8->updated_at->toDayDateTimeString(),
//            ],
//        ];

        return $this;
    }

    private function setAnswer9a(&$detail, ModelAnswers9a $answers9a){
        $detail['answer9a'] = [
            'status' => $answers9a->status,
            'comment' => $answers9a->status_comment,
            'data' => [

            ],
            'timestamp' => [
                'created' => $answers9a->created_at,
                'created_string' => $answers9a->created_at->toDayDateTimeString(),
                'updated' => $answers9a->updated_at,
                'updated_string' => $answers9a->updated_at->toDayDateTimeString(),
            ],
        ];

        return $this;
    }

    private function setAnswer9b(&$detail, ModelAnswers9b $answers9b){
        $detail['answer9b'] = [
            'status' => $answers9b->status,
            'comment' => $answers9b->status_comment,
            'data' => [

            ],
            'timestamp' => [
                'created' => $answers9b->created_at,
                'created_string' => $answers9b->created_at->toDayDateTimeString(),
                'updated' => $answers9b->updated_at,
                'updated_string' => $answers9b->updated_at->toDayDateTimeString(),
            ],
        ];

        return $this;
    }

    private function setAnswer9c(&$detail, Collection $answers9c){
//        $detail['answer9c'] = [
//            'status' => $answers9c->status,
//            'comment' => $answers9c->status_comment,
//            'data' => [
//
//            ],
//            'timestamp' => [
//                'created' => $answers9c->created_at,
//                'created_string' => $answers9c->created_at->toDayDateTimeString(),
//                'updated' => $answers9c->updated_at,
//                'updated_string' => $answers9c->updated_at->toDayDateTimeString(),
//            ],
//        ];

        return $this;
    }

    private function setAnswer10(&$detail, ModelAnswers10 $answers10){
        $detail['answer10'] = [
            'status' => $answers10->status,
            'comment' => $answers10->status_comment,
            'data' => [

            ],
            'timestamp' => [
                'created' => $answers10->created_at,
                'created_string' => $answers10->created_at->toDayDateTimeString(),
                'updated' => $answers10->updated_at,
                'updated_string' => $answers10->updated_at->toDayDateTimeString(),
            ],
        ];

        return $this;
    }

    private function setAnswer11(&$detail, Collection $answers11){
//        $detail['answer11'] = [
//            'status' => $answers11->status,
//            'comment' => $answers11->status_comment,
//            'data' => [
//
//            ],
//            'timestamp' => [
//                'created' => $answers11->created_at,
//                'created_string' => $answers11->created_at->toDayDateTimeString(),
//                'updated' => $answers11->updated_at,
//                'updated_string' => $answers11->updated_at->toDayDateTimeString(),
//            ],
//        ];

        return $this;
    }

    private function setAnswer12(&$detail, Collection $answers12){
//        $detail['answer12'] = [
//            'status' => $answers12->status,
//            'comment' => $answers12->status_comment,
//            'data' => [
//
//            ],
//            'timestamp' => [
//                'created' => $answers12->created_at,
//                'created_string' => $answers12->created_at->toDayDateTimeString(),
//                'updated' => $answers12->updated_at,
//                'updated_string' => $answers12->updated_at->toDayDateTimeString(),
//            ],
//        ];

        return $this;
    }

    private function setAnswer13(&$detail, Collection $answers13){
//        $detail['answer13'] = [
//            'status' => $answers13->status,
//            'comment' => $answers13->status_comment,
//            'data' => [
//
//            ],
//            'timestamp' => [
//                'created' => $answers13->created_at,
//                'created_string' => $answers13->created_at->toDayDateTimeString(),
//                'updated' => $answers13->updated_at,
//                'updated_string' => $answers13->updated_at->toDayDateTimeString(),
//            ],
//        ];

        return $this;
    }

    private function setAnswer14(&$detail, Collection $answers14){
//        $detail['answer14'] = [
//            'status' => $answers14->status,
//            'comment' => $answers14->status_comment,
//            'data' => [
//
//            ],
//            'timestamp' => [
//                'created' => $answers14->created_at,
//                'created_string' => $answers14->created_at->toDayDateTimeString(),
//                'updated' => $answers14->updated_at,
//                'updated_string' => $answers14->updated_at->toDayDateTimeString(),
//            ],
//        ];

        return $this;
    }

    private function setAnswer15a(&$detail, Collection $answers15a){
//        $detail['answer15a'] = [
//            'status' => $answers15a->status,
//            'comment' => $answers15a->status_comment,
//            'data' => [
//
//            ],
//            'timestamp' => [
//                'created' => $answers15a->created_at,
//                'created_string' => $answers15a->created_at->toDayDateTimeString(),
//                'updated' => $answers15a->updated_at,
//                'updated_string' => $answers15a->updated_at->toDayDateTimeString(),
//            ],
//        ];

        return $this;
    }

    private function setAnswer15b(&$detail, Collection $answers15b){
//        $detail['answer15b'] = [
//            'status' => $answers15b->status,
//            'comment' => $answers15b->status_comment,
//            'data' => [
//
//            ],
//            'timestamp' => [
//                'created' => $answers15b->created_at,
//                'created_string' => $answers15b->created_at->toDayDateTimeString(),
//                'updated' => $answers15b->updated_at,
//                'updated_string' => $answers15b->updated_at->toDayDateTimeString(),
//            ],
//        ];

        return $this;
    }

    private function setAnswer16a(&$detail, Collection $answers16a){
//        $detail['answer16a'] = [
//            'status' => $answers16a->status,
//            'comment' => $answers16a->status_comment,
//            'data' => [
//
//            ],
//            'timestamp' => [
//                'created' => $answers16a->created_at,
//                'created_string' => $answers16a->created_at->toDayDateTimeString(),
//                'updated' => $answers16a->updated_at,
//                'updated_string' => $answers16a->updated_at->toDayDateTimeString(),
//            ],
//        ];

        return $this;
    }

    private function setAnswer16b(&$detail, ModelAnswers16b $answers16b){
        $detail['answer16b'] = [
            'status' => $answers16b->status,
            'comment' => $answers16b->status_comment,
            'data' => [

            ],
            'timestamp' => [
                'created' => $answers16b->created_at,
                'created_string' => $answers16b->created_at->toDayDateTimeString(),
                'updated' => $answers16b->updated_at,
                'updated_string' => $answers16b->updated_at->toDayDateTimeString(),
            ],
        ];

        return $this;
    }

    private function setAnswer17(&$detail, Collection $answers17){
//        $detail['answer17'] = [
//            'status' => $answers17->status,
//            'comment' => $answers17->status_comment,
//            'data' => [
//
//            ],
//            'timestamp' => [
//                'created' => $answers17->created_at,
//                'created_string' => $answers17->created_at->toDayDateTimeString(),
//                'updated' => $answers17->updated_at,
//                'updated_string' => $answers17->updated_at->toDayDateTimeString(),
//            ],
//        ];

        return $this;
    }

    private function setAnswer18(&$detail, ModelAnswers18 $answers18){
        $detail['answer18'] = [
            'status' => $answers18->status,
            'comment' => $answers18->status_comment,
            'data' => [

            ],
            'timestamp' => [
                'created' => $answers18->created_at,
                'created_string' => $answers18->created_at->toDayDateTimeString(),
                'updated' => $answers18->updated_at,
                'updated_string' => $answers18->updated_at->toDayDateTimeString(),
            ],
        ];

        return $this;
    }
}