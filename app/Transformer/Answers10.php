<?php
namespace App\Transformer;

use App\Answers10 as ModelAnswers10;
use League\Fractal;

class Answers10 extends Fractal\TransformerAbstract
{
    public function transform(ModelAnswers10 $answers10)
    {
        return [
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
    }
}