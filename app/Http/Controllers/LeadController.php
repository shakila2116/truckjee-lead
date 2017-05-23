<?php

namespace App\Http\Controllers;

use App\Http\Requests\SourceRequest;
use App\Models\Location;
use App\Models\Route;
use App\Models\Source;
use App\Models\TruckModels;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function index(){
        return view('leads.index')->with(['leads'=>Source::all()]);
    }

    public function create(){

        return view('leads.create')->with(['truck_type'=> TruckModels::all()]);
    }

//    public function store(Request $request){
//        $source  = Source::create([
//            'name' =>$request->name ,
//            'company_name'=>$request->cmpny_name,
//            'phone'=>$request->phone,
//            'email'=>$request->email,
//            'type'=>$request->type
//        ]);
//        return $source;
//    }

    public function store(SourceRequest $request){
        return $request->save();
    }

    public function addRoute(Request $request){


        foreach ($request->route as $loc) {
            $location = Location::where('formatted_address', $loc['formatted_address'])->first();
            if ($location == null) {
            $location = Location::create([
                'formatted_address' => $loc['formatted_address'],
                'state' => $loc['state'],
                'district' => $loc['district'],
                'locality' => $loc['locality'],
                'created_by' => Auth()->user()->id
            ]);
           }
            $route = Route::create([
                'location_id' =>$location->id,
                'source_id'=>$request->source_id,
                'truck_type'=>$loc['truck_type']
            ]);
        }
        return $location;
    }
    public function show($id){
        return view('leads.show')->with(['truck_type'=> TruckModels::all(),'id'=>$id]);
    }
    protected function truckType($id){
        return "fkgj";
    }


}
