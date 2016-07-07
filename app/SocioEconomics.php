<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocioEconomics extends Model
{
    protected $table = 'socio_economics';

    protected $primaryKey = 'code';

    protected $dateFormat = 'Y-m-d H:i:s';

    protected $connection = 'mysql';

    protected $fillable = ['code', 'division', 'division_number', 'category', 'group'];

    public $incrementing = false;
}
