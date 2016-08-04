<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApprovedBy extends Model
{
    protected $table = 'approved_by';

    protected $primaryKey = 'id';

    protected $dateFormat = 'Y-m-d H:i:s';

    protected $connection = 'mysql';
}
