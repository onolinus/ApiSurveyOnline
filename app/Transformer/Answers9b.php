<?php
namespace App\Transformer;


use App\Answers9b as ModelAnswers9b;
use League\Fractal;

class Answers9b extends Fractal\TransformerAbstract
{
    public function transform(ModelAnswers9b $answers9b)
    {
        return [
            'id' => $answers9b->id,
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
    }
}