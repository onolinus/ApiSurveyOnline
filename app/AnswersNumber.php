<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnswersNumber extends Model
{
    protected $primaryKey = 'id';

    protected $dateFormat = 'Y-m-d H:i:s';

    protected $connection = 'mysql';

    protected $fillable = ['id_answer'];

    public function Answers()
    {
        return $this->belongsTo('App\Answers', 'id_answer', 'id');
    }

    public function scopeAnswerId($query, $id_answer)
    {
        return $query->where('id_answer', $id_answer);
    }

}
