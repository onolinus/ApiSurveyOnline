<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocioEconomic extends Model
{
    protected $table = 'socio_economic';

    protected $primaryKey = 'code';

    protected $dateFormat = 'Y-m-d H:i:s';

    protected $connection = 'mysql';

    protected $fillable = ['code', 'division', 'division_number', 'category', 'group'];
}
