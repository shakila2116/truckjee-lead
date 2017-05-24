<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    protected $table ='location_source_pivot';

    protected $fillable = ['location_id','source_id','truck_type'];

    public $with = ['location','source','truckType'];

    public function location(){
        return $this->belongsTo(Location::class,'location_id','id');
    }

    public function source(){
        return $this->belongsTo(Source::class,'source_id','id');
    }
    public function truckType(){
        return $this->belongsTo(TruckModels::class,'truck_type','id');
    }

}
