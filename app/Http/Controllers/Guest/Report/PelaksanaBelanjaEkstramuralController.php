<?php
namespace App\Http\Controllers\Guest\Report;

use App\Transformer\Report\PelaksanaBelanjaEkstramural;
use Illuminate\Support\Facades\DB;

class PelaksanaBelanjaEkstramuralController extends ReportController
{
    protected function getFromDb()
    {
        return DB::table('pelaksana_belanja_ekstramural')->first();
    }

    protected function getMeta(){
        return [
            'title' => $this->getTitle(),
            'total' => intval($this->data->total)
        ];
    }

    protected function getTitle()
    {
        return 'Belanja Litbang Ekstramural menurut Pelaksana';
    }

    protected function getTransformer()
    {
        return new PelaksanaBelanjaEkstramural();
    }

    protected function returnType()
    {
        return 'item';
    }

    protected function getCacheName()
    {
        return 'report:total:pelaksana:ekstramural';
    }
}
