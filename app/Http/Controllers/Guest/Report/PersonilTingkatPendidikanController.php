<?php
namespace App\Http\Controllers\Guest\Report;

use App\Transformer\Report\PersonilTingkatPendidikan;
use Illuminate\Support\Facades\DB;

class PersonilTingkatPendidikanController extends ReportController
{
    protected function getFromDb()
    {
        return DB::table('tingkat_pendidikan_personil_litbang')->first();
    }

    protected function getMeta(){
        return [
            'title' => $this->getTitle(),
            'total' => intval($this->data->total)
        ];
    }

    protected function getTitle()
    {
        return 'Total Personil Litbang menurut Tingkat Pendidikan';
    }

    protected function getTransformer()
    {
        return new PersonilTingkatPendidikan();
    }

    protected function returnType()
    {
        return 'item';
    }

    protected function getCacheName()
    {
        return 'report:personil:tingkatpendidikan';
    }
}
