<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answers extends Model
{
    protected $table = 'answers';

    protected $primaryKey = 'id';

    protected $dateFormat = 'Y-m-d H:i:s';

    protected $connection = 'mysql';

    protected $fillable = ['id_correspondent'];

    public function Correspondents()
    {
        return $this->belongsTo('App\Correspondents', 'id_correspondent', 'user_id');
    }

    public function Answers1()
    {
        return $this->hasOne('App\Answers1', 'id_answer', 'id');
    }

    public function Answers2()
    {
        return $this->hasOne('App\Answers2', 'id_answer', 'id');
    }

    public function Answers3()
    {
        return $this->hasOne('App\Answers3', 'id_answer', 'id');
    }

    public function Answers4()
    {
        return $this->hasOne('App\Answers4', 'id_answer', 'id');
    }

    public function Answers5()
    {
        return $this->hasMany('App\Answers5', 'id_answer', 'id');
    }

    public function Answers6()
    {
        return $this->hasMany('App\Answers6', 'id_answer', 'id');
    }

    public function Answers7()
    {
        return $this->hasOne('App\Answers7', 'id_answer', 'id');
    }

    public function Answers8()
    {
        return $this->hasMany('App\Answers8', 'id_answer', 'id');
    }

    public function Answers9a()
    {
        return $this->hasOne('App\Answers9a', 'id_answer', 'id');
    }

    public function Answers9b()
    {
        return $this->hasOne('App\Answers9b', 'id_answer', 'id');
    }

    public function Answers9c()
    {
        return $this->hasMany('App\Answers9c', 'id_answer', 'id');
    }

    public function Answers10()
    {
        return $this->hasOne('App\Answers10', 'id_answer', 'id');
    }

    public function Answers11()
    {
        return $this->hasMany('App\Answers11', 'id_answer', 'id');
    }

    public function Answers12()
    {
        return $this->hasMany('App\Answers12', 'id_answer', 'id');
    }

    public function Answers13()
    {
        return $this->hasMany('App\Answers13', 'id_answer', 'id');
    }

    public function Answers14()
    {
        return $this->hasMany('App\Answers14', 'id_answer', 'id');
    }

    public function Answers15a()
    {
        return $this->hasMany('App\Answers15a', 'id_answer', 'id');
    }

    public function Answers15b()
    {
        return $this->hasMany('App\Answers15b', 'id_answer', 'id');
    }

    public function Answers16a()
    {
        return $this->hasMany('App\Answers16a', 'id_answer', 'id');
    }

    public function Answers16b()
    {
        return $this->hasOne('App\Answers16b', 'id_answer', 'id');
    }

    public function Answers17()
    {
        return $this->hasMany('App\Answers17', 'id_answer', 'id');
    }

    public function Answers18()
    {
        return $this->hasOne('App\Answers18', 'id_answer', 'id');
    }

}
