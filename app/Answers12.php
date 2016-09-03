<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answers12 extends Model
{
    protected $table = 'answers12';

    protected $primaryKey = 'id';

    protected $dateFormat = 'Y-m-d H:i:s';

    protected $connection = 'mysql';

    protected $fillable = ['id_answer'];

    public function Answers()
    {
        return $this->belongsTo('App\Answers', 'id_answer', 'id');
    }

    public function ResearchFields()
    {
        return $this->belongsTo('App\ResearchFields', 'code', 'code');
    }

}
