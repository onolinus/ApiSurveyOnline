<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResearchFields extends Model
{
    protected $table = 'research_fields';

    protected $primaryKey = 'code';

    protected $dateFormat = 'Y-m-d H:i:s';

    protected $connection = 'mysql';

    protected $fillable = ['code', 'subject', 'area', 'sub_area'];

    public $incrementing = false;

    public function Answers5()
    {
        return $this->hasMany('App\Answers5', 'code', 'code');
    }

    public function Answers11()
    {
        return $this->hasMany('App\Answers11', 'code', 'code');
    }

    public function Answers12()
    {
        return $this->hasMany('App\Answers12', 'code', 'code');
    }
}
