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
            'detail' => $this->getDetail($answers),
            'timestamp' => [
                'created' => $answers->created_at,
                'created_string' => $answers->created_at->toDayDateTimeString(),
                'updated' => $answers->updated_at,
                'updated_string' => $answers->updated_at->toDayDateTimeString(),
            ],
            'links' => [
                'self' => route('validator.survey.show', [$answers->id_correspondent])
            ],
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

        if(!is_null($answers->Answers8)) {
            $this->setAnswer8($detail, $answers->Answers8);
        }


        $this->setAnswer9a($detail, $answers->Answers9a);
        $this->setAnswer9b($detail, $answers->Answers9b);
        $this->setAnswer9c($detail, $answers->Answers9c);

        if(!is_null($answers->Answers10)) {
            $this->setAnswer10($detail, $answers->Answers10);
        }

        if(!is_null($answers->Answers11)) {
            $this->setAnswer11($detail, $answers->Answers11);
        }

        if(!is_null($answers->Answers12)) {
            $this->setAnswer12($detail, $answers->Answers12);
        }

        if(!is_null($answers->Answers13)) {
            $this->setAnswer13($detail, $answers->Answers13);
        }

        if(!is_null($answers->Answers14)) {
            $this->setAnswer14($detail, $answers->Answers14);
        }

        if(!is_null($answers->Answers15a)) {
            $this->setAnswer15a($detail, $answers->Answers15a);
            $this->setAnswer15b($detail, $answers->Answers15b);
        }

        if(!is_null($answers->Answers16a)) {
            $this->setAnswer16a($detail, $answers->Answers16a);
            $this->setAnswer16b($detail, $answers->Answers16b);
        }

        if(!is_null($answers->Answers17)) {
            $this->setAnswer17($detail, $answers->Answers17);
        }

        $this->setAnswer18($detail, $answers->Answers18);

        return $detail;
    }

    private function setAnswer1(&$detail, ModelAnswers1 $answers1){
        $detail['answer1'] = [
            'status' => $answers1->status,
            'comment' => $answers1->status_comment,
            'data' => [
                'total' => doubleval($answers1->total),
                'percentage' => intval($answers1->percentage),
            ]
        ];

        return $this;
    }

    private function setAnswer2(&$detail, ModelAnswers2 $answers2){
        $detail['answer2'] = [
            'status' => $answers2->status,
            'comment' => $answers2->status_comment,
            'data' => [
                'jumlah' => doubleval($answers2->jumlah),
            ],
        ];

        return $this;
    }

    private function setAnswer3(&$detail, ModelAnswers3 $answers3){
        $detail['answer3'] = [
            'status' => $answers3->status,
            'comment' => $answers3->status_comment,
            'data' => [
                'dipa_danapemerintah' => doubleval($answers3->dipa_danapemerintah),
                'dipa_pnbp_perusahaanswasta' => doubleval($answers3->dipa_pnbp_perusahaanswasta),
                'dipa_pnbp_perusahaanswasta' => doubleval($answers3->dipa_pnbp_perusahaanswasta),
                'dipa_pnbp_instansipemerintah' => doubleval($answers3->dipa_pnbp_instansipemerintah),
                'dipa_pnbp_swastanonprofit' => doubleval($answers3->dipa_pnbp_swastanonprofit),
                'dipa_pnbp_luarnegeri' => doubleval($answers3->dipa_pnbp_luarnegeri),
                'dipa_phln' => doubleval($answers3->dipa_phln),
                'nondipa_insentif_ristekdikti' => doubleval($answers3->nondipa_insentif_ristekdikti),
                'nondipa_insentif_dalamnegeri' => doubleval($answers3->nondipa_insentif_dalamnegeri),
                'nondipa_insentif_researchgrant' => doubleval($answers3->nondipa_insentif_researchgrant),
            ],
        ];

        return $this;
    }

    private function setAnswer4(&$detail, ModelAnswers4 $answers4){
        $detail['answer4'] = [
            'status' => $answers4->status,
            'comment' => $answers4->status_comment,
            'data' => [
                'belanja_pegawai_upah' => doubleval($answers4->belanja_pegawai_upah),
                'belanja_modal_properti' => doubleval($answers4->belanja_modal_properti),
                'belanja_modal_mesin' => doubleval($answers4->belanja_modal_mesin),
                'belanja_operasional_maintenance' => doubleval($answers4->belanja_operasional_maintenance),
            ],
        ];

        return $this;
    }

    private function setAnswer5(&$detail, Collection $list_answers5){
        /** @var ModelAnswers5 $answers5 */
        foreach($list_answers5 as $index=>$answers5){
            if($index === 0){
                $detail['answer5']['status'] = $answers5->status;
                $detail['answer5']['comment'] = $answers5->status_comment;
            }

            $detail['answer5']['data'][] = [
                'id' => $answers5->id,
                'code' => $answers5->code,
                'percentage' => doubleval($answers5->percentage),
                'links' => [
                    'researchfields' => route("researchfields.show", $answers5->code)
                ]
            ];
        }

        return $this;
    }

    private function setAnswer6(&$detail, Collection $list_answers6){
        /** @var ModelAnswers6 $answers6 */
        foreach($list_answers6 as $index=>$answers6){
            if($index === 0){
                $detail['answer6']['status'] = $answers6->status;
                $detail['answer6']['comment'] = $answers6->status_comment;
            }

            $detail['answer6']['data'][] = [
                'id' => $answers6->id,
                'code' => $answers6->code,
                'percentage' => doubleval($answers6->percentage),
                'links' => [
                    'socioeconomics' => route("socioeconomics.show", $answers6->code)
                ]
            ];
        }

        return $this;
    }

    private function setAnswer7(&$detail, ModelAnswers7 $answers7){
        $detail['answer7'] = [
            'status' => $answers7->status,
            'comment' => $answers7->status_comment,
            'data' => [
                'penelitian_dasar' => doubleval($answers7->penelitian_dasar),
                'penelitian_terapan' => doubleval($answers7->penelitian_terapan),
                'pengembangan_eksperimental' => doubleval($answers7->pengembangan_eksperimental),
            ],
        ];

        return $this;
    }

    private function setAnswer8(&$detail, Collection $list_answers8){
        /** @var ModelAnswers8 $answers8 */
        foreach($list_answers8 as $index=>$answers8){
            if($index === 0){
                $detail['answer8']['status'] = $answers8->status;
                $detail['answer8']['comment'] = $answers8->status_comment;
            }

            $detail['answer8']['data'][] = [
                'id' => $answers8->id,
                'institusi' => $answers8->institusi,
                'jumlah_dana' => doubleval($answers8->jumlah_dana)
            ];
        }

        return $this;
    }

    private function setAnswer9a(&$detail, ModelAnswers9a $answers9a){
        $detail['answer9a'] = [
            'status' => $answers9a->status,
            'comment' => $answers9a->status_comment,
            'data' => [
                'total_pegawai' => intval($answers9a->total_pegawai),
            ],
        ];

        return $this;
    }

    private function setAnswer9b(&$detail, ModelAnswers9b $answers9b){
        $detail['answer9b'] = [
            'status' => $answers9b->status,
            'comment' => $answers9b->status_comment,
            'data' => [
                'peneliti_fungsional_peneliti_s1_l' => intval($answers9b->peneliti_fungsional_peneliti_s1_l),
                'peneliti_fungsional_peneliti_s1_p' => intval($answers9b->peneliti_fungsional_peneliti_s1_p),
                'peneliti_fungsional_peneliti_s1_fte_l' => doubleval($answers9b->peneliti_fungsional_peneliti_s1_fte_l),
                'peneliti_fungsional_peneliti_s1_fte_p' => doubleval($answers9b->peneliti_fungsional_peneliti_s1_fte_p),
                'peneliti_fungsional_peneliti_s2_l' => intval($answers9b->peneliti_fungsional_peneliti_s2_l),
                'peneliti_fungsional_peneliti_s2_p' => intval($answers9b->peneliti_fungsional_peneliti_s2_p),
                'peneliti_fungsional_peneliti_s2_fte_l' => doubleval($answers9b->peneliti_fungsional_peneliti_s2_fte_l),
                'peneliti_fungsional_peneliti_s2_fte_p' => doubleval($answers9b->peneliti_fungsional_peneliti_s2_fte_p),
                'peneliti_fungsional_peneliti_s3_l' => intval($answers9b->peneliti_fungsional_peneliti_s3_l),
                'peneliti_fungsional_peneliti_s3_p' => intval($answers9b->peneliti_fungsional_peneliti_s3_p),
                'peneliti_fungsional_peneliti_s3_fte_l' => doubleval($answers9b->peneliti_fungsional_peneliti_s3_fte_l),
                'peneliti_fungsional_peneliti_s3_fte_p' => doubleval($answers9b->peneliti_fungsional_peneliti_s3_fte_p),
                'peneliti_fungsional_nonpeneliti_s1_l' => intval($answers9b->peneliti_fungsional_nonpeneliti_s1_l),
                'peneliti_fungsional_nonpeneliti_s1_p' => intval($answers9b->peneliti_fungsional_nonpeneliti_s1_p),
                'peneliti_fungsional_nonpeneliti_s1_fte_l' => doubleval($answers9b->peneliti_fungsional_nonpeneliti_s1_fte_l),
                'peneliti_fungsional_nonpeneliti_s1_fte_p' => doubleval($answers9b->peneliti_fungsional_nonpeneliti_s1_fte_p),
                'peneliti_fungsional_nonpeneliti_s2_l' => intval($answers9b->peneliti_fungsional_nonpeneliti_s2_l),
                'peneliti_fungsional_nonpeneliti_s2_p' => intval($answers9b->peneliti_fungsional_nonpeneliti_s2_p),
                'peneliti_fungsional_nonpeneliti_s2_fte_l' => doubleval($answers9b->peneliti_fungsional_nonpeneliti_s2_fte_l),
                'peneliti_fungsional_nonpeneliti_s2_fte_p' => doubleval($answers9b->peneliti_fungsional_nonpeneliti_s2_fte_p),
                'peneliti_fungsional_nonpeneliti_s3_l' => intval($answers9b->peneliti_fungsional_nonpeneliti_s3_l),
                'peneliti_fungsional_nonpeneliti_s3_p' => intval($answers9b->peneliti_fungsional_nonpeneliti_s3_p),
                'peneliti_fungsional_nonpeneliti_s3_fte_l' => doubleval($answers9b->peneliti_fungsional_nonpeneliti_s3_fte_l),
                'peneliti_fungsional_nonpeneliti_s3_fte_p' => doubleval($answers9b->peneliti_fungsional_nonpeneliti_s3_fte_p),
                'peneliti_nonfungsional_s1_l' => intval($answers9b->peneliti_nonfungsional_s1_l),
                'peneliti_nonfungsional_s1_p' => intval($answers9b->peneliti_nonfungsional_s1_p),
                'peneliti_nonfungsional_s1_fte_l' => doubleval($answers9b->peneliti_nonfungsional_s1_fte_l),
                'peneliti_nonfungsional_s1_fte_p' => doubleval($answers9b->peneliti_nonfungsional_s1_fte_p),
                'peneliti_nonfungsional_s2_l' => intval($answers9b->peneliti_nonfungsional_s2_l),
                'peneliti_nonfungsional_s2_p' => intval($answers9b->peneliti_nonfungsional_s2_p),
                'peneliti_nonfungsional_s2_fte_l' => doubleval($answers9b->peneliti_nonfungsional_s2_fte_l),
                'peneliti_nonfungsional_s2_fte_p' => doubleval($answers9b->peneliti_nonfungsional_s2_fte_p),
                'peneliti_nonfungsional_s3_l' => intval($answers9b->peneliti_nonfungsional_s3_l),
                'peneliti_nonfungsional_s3_p' => intval($answers9b->peneliti_nonfungsional_s3_p),
                'peneliti_nonfungsional_s3_fte_l' => doubleval($answers9b->peneliti_nonfungsional_s3_fte_l),
                'peneliti_nonfungsional_s3_fte_p' => doubleval($answers9b->peneliti_nonfungsional_s3_fte_p),
                'teknisi_s1_l' => intval($answers9b->teknisi_s1_l),
                'teknisi_s1_p' => intval($answers9b->teknisi_s1_p),
                'teknisi_s1_fte_l' => doubleval($answers9b->teknisi_s1_fte_l),
                'teknisi_s1_fte_p' => doubleval($answers9b->teknisi_s1_fte_p),
                'teknisi_d3_l' => intval($answers9b->teknisi_d3_l),
                'teknisi_d3_p' => intval($answers9b->teknisi_d3_p),
                'teknisi_d3_fte_l' => doubleval($answers9b->teknisi_d3_fte_l),
                'teknisi_d3_fte_p' => doubleval($answers9b->teknisi_d3_fte_p),
                'teknisi_belowd3_l' => intval($answers9b->teknisi_belowd3_l),
                'teknisi_belowd3_p' => intval($answers9b->teknisi_belowd3_p),
                'teknisi_belowd3_fte_l' => doubleval($answers9b->teknisi_belowd3_fte_l),
                'teknisi_belowd3_fte_p' => doubleval($answers9b->teknisi_belowd3_fte_p),
                'staffpendukung_s1_l' => intval($answers9b->staffpendukung_s1_l),
                'staffpendukung_s1_p' => intval($answers9b->staffpendukung_s1_p),
                'staffpendukung_s1_fte_l' => doubleval($answers9b->staffpendukung_s1_fte_l),
                'staffpendukung_s1_fte_p' => doubleval($answers9b->staffpendukung_s1_fte_p),
                'staffpendukung_d3_l' => intval($answers9b->staffpendukung_d3_l),
                'staffpendukung_d3_p' => intval($answers9b->staffpendukung_d3_p),
                'staffpendukung_d3_fte_l' => doubleval($answers9b->staffpendukung_d3_fte_l),
                'staffpendukung_d3_fte_p' => doubleval($answers9b->staffpendukung_d3_fte_p),
                'staffpendukung_belowd3_l' => intval($answers9b->staffpendukung_belowd3_l),
                'staffpendukung_belowd3_p' => intval($answers9b->staffpendukung_belowd3_p),
                'staffpendukung_belowd3_fte_l' => doubleval($answers9b->staffpendukung_belowd3_fte_l),
                'staffpendukung_belowd3_fte_p' => doubleval($answers9b->staffpendukung_belowd3_fte_p),
            ],
        ];

        return $this;
    }

    private function setAnswer9c(&$detail, Collection $list_answers9c){
        /** @var ModelAnswers9c $answers9c */
        foreach($list_answers9c as $index=>$answers9c){
            if($index === 0){
                $detail['answer9c']['status'] = $answers9c->status;
                $detail['answer9c']['comment'] = $answers9c->status_comment;
            }

            $detail['answer9c']['data'][] = [
                'id' => $answers9c->id,
                's1_l' => intval($answers9c->s1_l),
                's1_p' => intval($answers9c->s1_p),
                's2_l' => intval($answers9c->s2_l),
                's2_p' => intval($answers9c->s2_p),
                's3_l' => intval($answers9c->s3_l),
                's3_p' => intval($answers9c->s3_p),
                'code' => $answers9c->code,
                'links' => [
                    'bidangilmu' => route("bidangilmu.show", $answers9c->code)
                ]
            ];
        }

        return $this;
    }

    private function setAnswer10(&$detail, ModelAnswers10 $answers10){
        /** @var ModelAnswers10 $answers10 */
        $detail['answer10'] = [
            'status' => $answers10->status,
            'comment' => $answers10->status_comment,
            'data' => [
                'jumlah_peneliti_pemerintah' => intval($answers10->jumlah_peneliti_pemerintah),
                'jumlah_peneliti_perguruantinggi' => intval($answers10->jumlah_peneliti_perguruantinggi),
                'jumlah_peneliti_industri' => intval($answers10->jumlah_peneliti_industri),
                'jumlah_peneliti_lembagaswadaya' => intval($answers10->jumlah_peneliti_lembagaswadaya),
                'jumlah_peneliti_asing' => intval($answers10->jumlah_peneliti_asing),
            ],
        ];

        return $this;
    }

    private function setAnswer11(&$detail, Collection $list_answers11){
        /** @var ModelAnswers11 $answers11 */
        foreach($list_answers11 as $index=>$answers11){
            if($index === 0){
                $detail['answer11']['status'] = $answers11->status;
                $detail['answer11']['comment'] = $answers11->status_comment;
            }

            $detail['answer11']['data'][] = [
                'id' => $answers11->id,
                'code' => $answers11->code,
                'nama_jurnal' => $answers11->nama_jurnal,
                'jumlah' => $answers11->jumlah,
                'links' => [
                    'researchfields' => route("researchfields.show", $answers11->code)
                ]
            ];
        }

        return $this;
    }

    private function setAnswer12(&$detail, Collection $list_answers12){
        /** @var ModelAnswers12 $answers12 */
        foreach($list_answers12 as $index=>$answers12){
            if($index === 0){
                $detail['answer12']['status'] = $answers12->status;
                $detail['answer12']['comment'] = $answers12->status_comment;
            }

            $detail['answer12']['data'][] = [
                'id' => $answers12->id,
                'code' => $answers12->code,
                'nama_jurnal' => $answers12->nama_jurnal,
                'jumlah' => $answers12->jumlah,
                'links' => [
                    'researchfields' => route("researchfields.show", $answers12->code)
                ]
            ];
        }

        return $this;
    }

    private function setAnswer13(&$detail, Collection $list_answers13){
        /** @var ModelAnswers13 $answers13 */
        foreach($list_answers13 as $index=>$answers13){
            if($index === 0){
                $detail['answer13']['status'] = $answers13->status;
                $detail['answer13']['comment'] = $answers13->status_comment;
            }

            $detail['answer13']['data'][] = [
                'id' => $answers13->id,
                'nama_peneliti' => $answers13->nama_peneliti,
                'nama_seminar' => $answers13->nama_seminar,
                'negara_penyelenggara_seminar' => $answers13->negara_penyelenggara_seminar,
            ];
        }

        return $this;
    }

    private function setAnswer14(&$detail, Collection $list_answers14){
        /** @var ModelAnswers14 $answers14 */
        foreach($list_answers14 as $index=>$answers14){
            if($index === 0){
                $detail['answer14']['status'] = $answers14->status;
                $detail['answer14']['comment'] = $answers14->status_comment;
            }

            $detail['answer14']['data'][] = [
                'id' => $answers14->id,
                'nama_penerima_award' => $answers14->nama_penerima_award,
                'nama_award' => $answers14->nama_award,
                'institusi_pemberi_award' => $answers14->institusi_pemberi_award,
            ];
        }

        return $this;
    }

    private function setAnswer15a(&$detail, Collection $list_answers15a){
        /** @var ModelAnswers15a $answers15a */
        foreach($list_answers15a as $index=>$answers15a){
            if($index === 0){
                $detail['answer15a']['status'] = $answers15a->status;
                $detail['answer15a']['comment'] = $answers15a->status_comment;
            }

            $detail['answer15a']['data'][] = [
                'id' => $answers15a->id,
                'nama_barang' => $answers15a->nama_barang,
                'terkomersialisasi' => intval($answers15a->terkomersialisasi),
                'tahun' => intval($answers15a->tahun),
            ];
        }

        return $this;
    }

    private function setAnswer15b(&$detail, Collection $list_answers15b){
        /** @var ModelAnswers15b $answers15b */
        foreach($list_answers15b as $index=>$answers15b){
            if($index === 0){
                $detail['answer15b']['status'] = $answers15b->status;
                $detail['answer15b']['comment'] = $answers15b->status_comment;
            }

            $detail['answer15b']['data'][] = [
                'id' => $answers15b->id,
                'nama_jasa' => $answers15b->nama_jasa,
                'pengguna_jasa' => $answers15b->pengguna_jasa,
                'tahun' => intval($answers15b->tahun),
            ];
        }

        return $this;
    }

    private function setAnswer16a(&$detail, Collection $list_answers16a){
        /** @var ModelAnswers16a $answers16a */
        foreach($list_answers16a as $index=>$answers16a){
            if($index === 0){
                $detail['answer16a']['status'] = $answers16a->status;
                $detail['answer16a']['comment'] = $answers16a->status_comment;
            }

            $detail['answer16a']['data'][] = [
                'id' => $answers16a->id,
                'usulan_paten' => intval($answers16a->usulan_paten),
                'usulan_patensederhana' => intval($answers16a->usulan_patensederhana),
                'usulan_patensederhana' => intval($answers16a->usulan_patensederhana),
                'disetujui_paten' => intval($answers16a->disetujui_paten),
                'disetujui_patensederhana' => intval($answers16a->disetujui_patensederhana),
                'terkomersialisasi_paten' => intval($answers16a->terkomersialisasi_paten),
                'terkomersialisasi_patensederhana' => intval($answers16a->terkomersialisasi_patensederhana),
            ];
        }

        return $this;
    }

    private function setAnswer16b(&$detail, ModelAnswers16b $answers16b){
        $detail['answer16b'] = [
            'status' => $answers16b->status,
            'comment' => $answers16b->status_comment,
            'data' => [
                'jumlah_patenluarnegeri' => intval($answers16b->jumlah_patenluarnegeri),
            ],
        ];

        return $this;
    }

    private function setAnswer17(&$detail, Collection $list_answers17){
        /** @var ModelAnswers17 $answers17 */
        foreach($list_answers17 as $index=>$answers17){
            if($index === 0){
                $detail['answer17']['status'] = $answers17->status;
                $detail['answer17']['comment'] = $answers17->status_comment;
            }

            $detail['answer17']['data'][] = [
                'id' => $answers17->id,
                'lisensi' => intval($answers17->lisensi),
                'tahun' => intval($answers17->tahun),
                'nilai' => doubleval($answers17->nilai),
            ];
        }

        return $this;
    }

    private function setAnswer18(&$detail, ModelAnswers18 $answers18){
        $detail['answer18'] = [
            'status' => $answers18->status,
            'comment' => $answers18->status_comment,
            'data' => [
                'comment' => $answers18->comment,
            ],
        ];

        return $this;
    }
}