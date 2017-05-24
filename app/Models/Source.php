<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Source extends Model
{
    protected $table ='source';

    protected $guarded =['id'];

    protected $with = ['leadLocation'];

    public function user(){
        return $this->belongsTo('App\User','created_by','id');
    }
    public function route(){
        return $this->hasMany(Route::class,'source_id','id');
    }

    public function location($id){
        $loc =  Location::find($id);
        return $loc->formatted_address;
    }

    public function leadLocation(){
        return $this->hasOne(Location::class,'id','lead_location_id');
    }
    public function truckType($id){
        $model =  TruckModels::find($id);
        return $model->name;
    }
    public function type($id){
        switch ($id){
            case 1:
                return "Broker";
            break;
            case 2:
                return "Owner";
            break;

        }
    }
}
