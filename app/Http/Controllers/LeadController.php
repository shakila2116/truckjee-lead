<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Route;
use App\Models\Source;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function index(){

        return view('leads.index');
    }

    public function create(){

        return view('leads.create');
    }

    public function store(Request $request){
        $source  = Source::create([
            'name' =>$request->name ,
            'company_name'=>$request->cmpny_name,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'type'=>$request->type
        ]);
       if($request->route)
        foreach ($request->route as $loc){
            $location = Location::create([
                'formatted_address'=>$loc['formatted_address'],
                'state' =>$loc['state'],
                'district' =>$loc['district'],
                'locality' =>$loc['locality'],
                'created_by' =>Auth()->user()->id
            ]);
//            dd($location->id,$source->id,$request['truck_type']);
            $route = Route::create([
                'location_id' =>$location->id,
                'source_id'=>$source->id,
                'truck_type'=>$request->truck_type
            ]);

        }

    }
}
