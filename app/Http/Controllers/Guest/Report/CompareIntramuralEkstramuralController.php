<?php
namespace App\Http\Controllers\Guest\Report;

use App\Transformer\Report\CompareEkstramuralIntramural;
use Illuminate\Support\Facades\DB;

class CompareIntramuralEkstramuralController extends ReportController
{
    protected function getFromDb()
    {
        return DB::table('compare_belanja_ekstramural_intramural')->first();
    }

    protected function getMeta(){
        return [
            'title' => $this->getTitle(),
            'total' => doubleval($this->data->total)
        ];
    }

    protected function getTitle()
    {
        return 'Belanja Litbang Ekstramural dan Intramural';
    }

    protected function getTransformer()
    {
        return new CompareEkstramuralIntramural();
    }

    protected function returnType()
    {
        return 'item';
    }

    protected function getCacheName()
    {
        return 'report:compare:ekstramural:intramural';
    }
}
