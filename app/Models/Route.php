<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    protected $table ='location_source_pivot';

    protected $fillable = ['location_id','source_id','truck_type'];

}
