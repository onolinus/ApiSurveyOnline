<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answers extends Model
{
    protected $table = 'answers';

    protected $primaryKey = 'id';

    protected $dateFormat = 'Y-m-d H:i:s';

    protected $connection = 'mysql';

    public function Correspondents()
    {
        return $this->belongsTo('App\Correspondents', 'id_correspondent', 'user_id');
    }

    public function Answers1()
    {
        return $this->hasMany('App\Answers1', 'id_answer', 'id');
    }

    public function Answers2()
    {
        return $this->hasMany('App\Answers2', 'id_answer', 'id');
    }

    public function Answers3()
    {
        return $this->hasMany('App\Answers3', 'id_answer', 'id');
    }

    public function Answers4()
    {
        return $this->hasMany('App\Answers4', 'id_answer', 'id');
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
        return $this->hasMany('App\Answers7', 'id_answer', 'id');
    }

    public function Answers8()
    {
        return $this->hasMany('App\Answers8', 'id_answer', 'id');
    }

    public function Answers9()
    {
        return $this->hasMany('App\Answers9', 'id_answer', 'id');
    }

    public function Answers10()
    {
        return $this->hasMany('App\Answers10', 'id_answer', 'id');
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

    public function Answers15()
    {
        return $this->hasMany('App\Answers15', 'id_answer', 'id');
    }

    public function Answers16()
    {
        return $this->hasMany('App\Answers16', 'id_answer', 'id');
    }

    public function Answers17()
    {
        return $this->hasMany('App\Answers17', 'id_answer', 'id');
    }

    public function Answers18()
    {
        return $this->hasMany('App\Answers18', 'id_answer', 'id');
    }

}
