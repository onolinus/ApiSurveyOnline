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

    public function Correspondents()
    {
        return $this->hasMany('App\Correspondents', 'id_lembaga', 'id');
    }

    public function usersCount()
    {
        return $this->hasOne('App\ApprovedBy', 'id_lembaga', 'id')
            ->selectRaw('id_lembaga, count(*) as aggregate')
            ->groupBy('id_lembaga');
    }

    public function getUsersCountAttribute()
    {
      // if relation is not loaded already, let's do it first
      if ( ! array_key_exists('usersCount', $this->relations))
        $this->load('usersCount');

      $related = $this->getRelation('usersCount');

      // then return the count directly
      return ($related) ? (int) $related->aggregate : 0;
    }
}
