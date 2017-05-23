<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table ='location';

    protected $guarded =['id'];

    public function user(){
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
    public function truckType($id){
        return TruckModels::find($id)->with['name'];
    }
}
