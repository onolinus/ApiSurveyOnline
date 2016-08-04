<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lembaga extends Model
{
    protected $table = 'lembaga';

    protected $primaryKey = 'name';

    protected $dateFormat = 'Y-m-d H:i:s';

    protected $connection = 'mysql';
}
