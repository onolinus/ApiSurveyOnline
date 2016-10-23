<?php
namespace App\Http\Controllers\Guest\Report;

use App\Transformer\Report\PersonilKlasifikasi;
use Illuminate\Support\Facades\DB;

class PersonilKlasifikasiController extends ReportController
{
    protected function getFromDb()
    {
        return DB::table('klasifikasi_personil_litbang')->first();
    }

    protected function getMeta(){
        return [
            'title' => $this->getTitle(),
            'total' => intval($this->data->total)
        ];
    }

    protected function getTitle()
    {
        return 'Total Personil Litbang menurut Klasifikasinya';
    }

    protected function getTransformer()
    {
        return new PersonilKlasifikasi();
    }

    protected function returnType()
    {
        return 'item';
    }

    protected function getCacheName()
    {
        return 'report:personil:klasifikasi';
    }
}
