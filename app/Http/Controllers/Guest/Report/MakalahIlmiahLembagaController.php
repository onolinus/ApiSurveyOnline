<?php
namespace App\Http\Controllers\Guest\Report;

use App\Transformer\Report\MakalahIlmiahLembaga;
use Illuminate\Support\Facades\DB;

class MakalahIlmiahLembagaController extends ReportController
{
    protected function getFromDb()
    {
        $data = DB::table('makalah_ilmiah_per_lembaga')->get();
        return $data;
    }

    protected function getMeta(){
        return [
            'title' => $this->getTitle(),
        ];
    }

    protected function getTitle()
    {
        return 'Distribusi Makalah Ilmiah pada Jurnal Internasional';
    }

    protected function getTransformer()
    {
        return new MakalahIlmiahLembaga();
    }

    protected function returnType()
    {
        return 'item';
    }

    protected function getCacheName()
    {
        return 'report:makalahilmiah:lembaga';
    }
}
