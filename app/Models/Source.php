<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Source extends Model
{
    protected $table ='source';

    protected $guarded =['id'];

    public function user(){
        return $this->belongsTo('App\User','created_by','id');
    }
    public function route(){
        return $this->hasMany(Route::class,'source_id','id');
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
