<?php
namespace App\Http\Controllers\Guest\Report;

use App\Transformer\Report\PatenSektorPemerintah;
use Illuminate\Support\Facades\DB;

class PatenSektorPemerintahController extends ReportController
{
    protected function getFromDb()
    {
        $data = DB::table('paten_sektor_pemerintah')->first();
        return $data;
    }

    protected function getMeta(){
        return [
            'title' => $this->getTitle(),
            'total' => doubleval($this->data->total)
        ];
    }

    protected function getTitle()
    {
        return 'Perkembangan Paten Sektor Pemerintah Tahun 2013-2015';
    }

    protected function getTransformer()
    {
        return new PatenSektorPemerintah();
    }

    protected function returnType()
    {
        return 'item';
    }

    protected function getCacheName()
    {
        return 'report:paten:pemerintah';
    }
}
