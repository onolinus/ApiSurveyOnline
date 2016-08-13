<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transformer\KlasifikasiBidangIlmuTransformer;

class KlasifikasiBidangIlmuController extends BaseController
{
    //
    protected function getModelName()
    {
        return 'KlasifikasiBidangIlmu';
    }

    protected function getModelLabel()
    {
        return 'kode bidang ilmu';
    }

    protected function getTransformer()
    {
        return new KlasifikasiBidangIlmuTransformer();
    }

    protected function usePaginationByDefault(){
        return false;
    }
}
