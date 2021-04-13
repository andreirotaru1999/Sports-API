<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sport;
use App\Models\location;
use App\Models\location_sport;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use DateTime;
class Location_sports_Controller extends Controller
{
    //Return array of location_sports
    public function index()
    {
        return location_sport::all();
    }

   //Create new location_sport
    public function assign(Request $request)
    {
        $sport=$request->input("sport_id");
        $location=$request->input("location_id");
        $location_sport=location_sport::create($request->all());
        return response()->json($location_sport,201);
    }

    //Return a location_sport by id
    public function show($id)
    {
        return location_sport::find($id);
    }

    //Update a location_sport 
    public function update(Request $request,location_sport $location_sport)
    {
        $location_sport->update($request->all());
        return response()->json($location_sport,200);
    }

    //Delete a location_sport
    public function destroy(location_sport $location_sport)
    {
        $location_sport->delete();
        return response()->json("{count: 1}",200);
 
    }

    //Return filtered array of location_sports. Possible filters are sport_id, start_date, end_date
    public function getsport(Request $request)
    {   
        //Sanitize date parameters
        $validator = Validator::make($request->all(), [
            'start_date' => 'date',
            'end_date' => 'date|after_or_equal:start_date'
            ]);
    
        if ($validator->fails()) {
            return response(
                $validator->errors(),
                500
            );
        }

        //check if id parameter exists
        if($request->input('id')){
            $id=explode(",",$request->input('id'));
        }

        //check if start_date parameter exists
        if($request->input("start_date")) {
            $start_date=$request->input("start_date");
        }

        //check if end_date parameter exists
        if($request->input("end_date")) {
            $end_date=$request->input("end_date");
        }

        $query=DB::table("location_sport")
                                ->join('locations','location_sport.location_id', '=', 'locations.id')
                                ->join('sports','location_sport.sport_id' , '=', 'sports.id')
                                ->select('locations.name as locationName','location_sport.cost','location_sport.start_date','location_sport.end_date', 'sports.name as sportName');
        
        //if $id exists, modify query
        if(isset($id)) {
            $query->whereIn("sport_id", $id);
        }

        //if $start_date exists, modify query
        if(isset($start_date)){
            $query->where("start_date", "<=", $start_date);
        }

        //if $end_date exists, modify query
        if(isset($end_date)){
            $query->where("end_date", ">=", $end_date);
        }

        if(isset($start_date) && isset($end_date)){
            $query->where("start_date", "<=", "end_date");
        }

        $location_sports=$query->orderby("cost", "asc")
                        ->get();

        //if $start_date and $end_date both exist, calculate the number of days between them,
        //and add a new totalCost property to each location_sport
        if(isset($start_date) && isset($end_date)){
            $datetime1 = new DateTime($start_date);
            $datetime2 = new DateTime($end_date);
            $interval = $datetime1->diff($datetime2);
            $days = intval($interval->format('%a'));
            foreach($location_sports as $location_sport){
                $location_sport->totalCost = $location_sport->cost * $days;
            }
        }
        return $location_sports;
    }
}
