<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lembaga extends Model
{
    protected $table = 'lembaga';

    protected $primaryKey = 'id';

    protected $dateFormat = 'Y-m-d H:i:s';

    protected $connection = 'mysql';

    public function Lembaga()
    {
        return $this->hasMany('App\ApprovedBy', 'id_lembaga', 'id');
    }
}
