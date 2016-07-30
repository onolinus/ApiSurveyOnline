<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegistrasiToken extends Model
{
    protected $table = 'registrasi_tokens';

    protected $primaryKey = 'token';

    protected $dateFormat = 'Y-m-d H:i:s';

    protected $connection = 'mysql';

    public $incrementing = false;

    public $timestamps = false;
}
