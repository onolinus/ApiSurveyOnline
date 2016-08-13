<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KlasifikasiBidangIlmu extends Model
{
    protected $table = 'klasifikasi_bidang_ilmu';

    protected $primaryKey = 'code';

    protected $dateFormat = 'Y-m-d H:i:s';

    protected $connection = 'mysql';

    public $incrementing = false;
}
