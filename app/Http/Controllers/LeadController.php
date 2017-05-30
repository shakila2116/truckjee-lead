<?php

namespace App\Http\Controllers;

use App\Events\UserCreatedEvent;
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

    public function store(SourceRequest $request){
        $location = $this->location($request);
        $source =  $request->save($location->id);
        return redirect('leads/'.$source->id);
    }

    public function addRoute(Request $request){
        $source = Source::find($request->source_id);
        foreach ($request->route as $loc) {
          $location = $this->location($loc);
            $route = Route::create([
                'location_id' =>$location->id,
                'source_id'=>$request->source_id,
                'truck_type'=>$loc['truck_type']
            ]);
        }
        event(new UserCreatedEvent($source));
        return $location;
    }
    public function show($id){
        return view('leads.show')->with(['truck_type'=> TruckModels::all(),'id'=>$id]);
    }

    protected function location($loc)
    {
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
        return $location;
    }

}
