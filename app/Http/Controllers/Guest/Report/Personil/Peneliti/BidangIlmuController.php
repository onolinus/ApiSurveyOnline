<?php
namespace App\Http\Controllers\Guest\Report\Personil\Peneliti;

use App\Http\Controllers\Guest\Report\ReportController;
use App\Transformer\Report\Personil\Peneliti\BidangIlmu;
use Illuminate\Support\Facades\DB;

class BidangIlmuController extends ReportController
{
    protected function getFromDb()
    {
        $data = DB::table('bidang_ilmu_peneliti')->get();
        return $data;
    }

    protected function getMeta(){
        return [
            'title' => $this->getTitle()
        ];
    }

    protected function getTitle()
    {
        return 'Peneliti menurut Bidang Ilmu pada Pendidikan Terakhir';
    }

    protected function getTransformer()
    {
        return new BidangIlmu();
    }

    protected function returnType()
    {
        return 'collection';
    }

    protected function getCacheName()
    {
        return 'report:personil:peneliti:bidangilmu';
    }
}
