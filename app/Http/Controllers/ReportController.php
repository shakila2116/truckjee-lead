<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Route;
use App\Models\TruckModels;
use Illuminate\Http\Request;

class ReportController extends Controller
{

    public function show(){
        return view('report.show')->with(['truck_type'=> TruckModels::all()]);
    }

    public function generateReport(Request $request){

        if( ($request['formatted_address'] !=null ) || (($request['formatted_address']!=null)&&($request['truck_type'] !=null))) {
            $location = Location::where('formatted_address', $request['formatted_address'])->first();

            if($location == null){
                $location = Location::where('district',$request['district'])->orwhere('state',$request['state'])->first();
            }

            if (($request['truck_type']!=null) && ($location != null)) {
                $route = Route::where('location_id', $location->id)->where('truck_type', $request['truck_type'])->get();
            } elseif((($request['truck_type']) == null) && ($location !=null)) {
                $route = Route::where('location_id', $location->id)->get();
            }

        }elseif($request['truck_type'] !=null){
            $route = Route::where('truck_type',$request['truck_type'])->get();
        }
//            dd($route);
        return $route;

    }
}
