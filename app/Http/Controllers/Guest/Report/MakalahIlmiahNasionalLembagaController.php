<?php
namespace App\Http\Controllers\Guest\Report;

use App\Transformer\Report\MakalahIlmiahNasionalLembaga;
use Illuminate\Support\Facades\DB;

class MakalahIlmiahNasionalLembagaController extends ReportController
{
    protected function getFromDb()
    {
        $data = DB::table('makalah_ilmiah_nasional_per_lembaga')->get();
        return $data;
    }

    protected function getMeta(){
        return [
            'title' => $this->getTitle(),
        ];
    }

    protected function getTitle()
    {
        return 'Distribusi Makalah Ilmiah pada Jurnal Nasional';
    }

    protected function getTransformer()
    {
        return new MakalahIlmiahNasionalLembaga();
    }

    protected function returnType()
    {
        return 'item';
    }

    protected function getCacheName()
    {
        return 'report:makalahilmiah:nasional:lembaga';
    }
}
