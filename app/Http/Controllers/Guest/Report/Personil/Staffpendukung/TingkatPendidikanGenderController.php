<?php
namespace App\Http\Controllers\Guest\Report\Personil\Staffpendukung;

use App\Http\Controllers\Guest\Report\ReportController;
use App\Transformer\Report\Personil\Staffpendukung\TingkatPendidikanGender;
use Illuminate\Support\Facades\DB;

class TingkatPendidikanGenderController extends ReportController
{
    protected function getFromDb()
    {
        $data = DB::table('personil_staffpendukung_tingkat_pendidikan_gender')->first();
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
        return 'Perbandingan Jumlah Staff Pendukung menurut Jenis Kelamin dan Tingkat Pendidikan';
    }

    protected function getTransformer()
    {
        return new TingkatPendidikanGender();
    }

    protected function returnType()
    {
        return 'item';
    }

    protected function getCacheName()
    {
        return 'report:personil:staffpendukung:tingkatpendidikan:gender';
    }
}
