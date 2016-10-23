<?php
namespace App\Http\Controllers\Guest\Report;

use App\Transformer\Report\PenelitiLuar;
use Illuminate\Support\Facades\DB;

class PenelitiLuarController extends ReportController
{
    protected function getFromDb()
    {
        $data = DB::table('komposisi_peneliti_luar')->first();
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
        return 'Komposisi Peneliti Luar dalam Aktivitas Litbang Sektor Pemerintah';
    }

    protected function getTransformer()
    {
        return new PenelitiLuar();
    }

    protected function returnType()
    {
        return 'item';
    }

    protected function getCacheName()
    {
        return 'report:peneliti:luar';
    }
}
