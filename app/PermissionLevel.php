<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PermissionLevel extends Model
{
    protected $table = 'userlevelpermissions';
    protected $guarded = array();
}

