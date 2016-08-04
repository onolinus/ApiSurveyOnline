<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'users';

    protected $primaryKey = 'id';

    protected $dateFormat = 'Y-m-d H:i:s';

    protected $connection = 'mysql';

    public function registrasitoken()
    {
        return $this->hasOne('App\RegistrasiToken', 'user_id', 'id');
    }

    public function correspondents()
    {
        return $this->hasOne('App\Correspondents', 'user_id', 'id');
    }
}
