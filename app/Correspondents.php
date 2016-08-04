<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Correspondents extends Model
{
    protected $table = 'correspondents';

    protected $primaryKey = 'user_id';

    protected $dateFormat = 'Y-m-d H:i:s';

    protected $connection = 'mysql';

    protected $fillable = ['user_id'];

    public function user()
    {
        return $this->belongsTo('App\Users', 'user_id', 'id');
    }

    public function approvedBy()
    {
        return $this->hasOne('App\ApprovedBy', 'correspondent_id_approved', 'user_id');
    }
}
