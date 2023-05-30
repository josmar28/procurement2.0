<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supply extends Model
{
    protected $primaryKey = 'supply_id';
    protected $table = 'supply';
    protected $guarded = array();
}

