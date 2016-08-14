<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answers7 extends Model
{
    protected $table = 'answers7';

    protected $primaryKey = 'id';

    protected $dateFormat = 'Y-m-d H:i:s';

    protected $connection = 'mysql';

    public function Answers()
    {
        return $this->belongsTo('App\Answers', 'id_answer', 'id');
    }

}
