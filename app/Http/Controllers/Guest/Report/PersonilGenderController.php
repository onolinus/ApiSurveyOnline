<?php
namespace App\Http\Controllers\Guest\Report;

use App\Transformer\Report\PersonilGender;
use Illuminate\Support\Facades\DB;

class PersonilGenderController extends ReportController
{
    protected function getFromDb()
    {
        return DB::table('gender_personil_litbang')->first();
    }

    protected function getMeta(){
        return [
            'title' => $this->getTitle(),
            'total' => doubleval($this->data->total)
        ];
    }

    protected function getTitle()
    {
        return 'Jumlah Personil Litbang menurut Jenis Kelamin';
    }

    protected function getTransformer()
    {
        return new PersonilGender();
    }

    protected function returnType()
    {
        return 'item';
    }

    protected function getCacheName()
    {
        return 'report:personil:gender';
    }
}
