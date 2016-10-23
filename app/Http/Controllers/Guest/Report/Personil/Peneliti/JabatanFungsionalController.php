<?php
namespace App\Http\Controllers\Guest\Report\Personil\Peneliti;

use App\Http\Controllers\Guest\Report\ReportController;
use App\Transformer\Report\Personil\Peneliti\JabatanFungsional;
use Illuminate\Support\Facades\DB;

class JabatanFungsionalController extends ReportController
{
    protected function getFromDb()
    {
        $data = DB::table('personil_peneliti_per_jabatan_fungsional')->first();
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
        return 'Distribusi Peneliti menurut jabatan fungsional';
    }

    protected function getTransformer()
    {
        return new JabatanFungsional();
    }

    protected function returnType()
    {
        return 'item';
    }

    protected function getCacheName()
    {
        return 'report:personil:peneliti:jabatanfungsional';
    }
}
