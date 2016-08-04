<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApprovedBy extends Model
{
    protected $table = 'approved_by';

    protected $primaryKey = 'correspondent_id_approved';

    protected $dateFormat = 'Y-m-d H:i:s';

    protected $connection = 'mysql';

    public $incrementing = false;

    protected $fillable = ['correspondent_id_approved'];

    public function Correspondents()
    {
        return $this->belongsTo('App\Correspondents', 'correspondent_id_approved', 'user_id');
    }
}
