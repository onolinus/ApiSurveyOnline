<?php
namespace App\Http\Controllers\Guest\Report\Personil\Peneliti;

use App\Http\Controllers\Guest\Report\ReportController;
use App\Transformer\Report\Personil\Peneliti\JabatanFungsionalPerLembaga;
use Illuminate\Support\Facades\DB;

class JabatanFungsionalPerLembagaController extends ReportController
{
    protected function getFromDb()
    {
        $data = DB::table('jumlah_peneliti_fungsional_per_lembaga')->get();
        return $data;
    }

    protected function getMeta(){
        return [
            'title' => $this->getTitle()
        ];
    }

    protected function getTitle()
    {
        return 'Distribusi Peneliti menurut jabatan fungsional per lembaga';
    }

    protected function getTransformer()
    {
        return new JabatanFungsionalPerLembaga();
    }

    protected function returnType()
    {
        return 'collection';
    }

    protected function getCacheName()
    {
        return 'report:personil:peneliti:jabatanfungsionalperlembaga';
    }
}
