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
}
