<?php
namespace App\Http\Controllers\Guest\Report;

use App\Transformer\Report\LembagaPemilikLisensi;
use Illuminate\Support\Facades\DB;

class LembagaPemilikLisensiController extends ReportController
{
    protected function getFromDb()
    {
        $data = DB::table('jumlah_lisensi_per_lembaga')->get();
        return $data;
    }

    protected function getMeta(){
        return [
            'title' => $this->getTitle(),
        ];
    }

    protected function getTitle()
    {
        return 'Lembaga Pemilik Lisensi 2013-2015';
    }

    protected function getTransformer()
    {
        return new LembagaPemilikLisensi();
    }

    protected function returnType()
    {
        return 'collection';
    }

    protected function getCacheName()
    {
        return 'report:lembaga:pemiliklisensi';
    }
}
