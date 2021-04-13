<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sport;
use App\Models\location;
use App\Models\location_sport;
use Illuminate\Support\Facades\DB;
use DateTime;
class Location_sports_Controller extends Controller
{
    public function index()
    {
        return location_sport::all();
    }
   
    public function assign(Request $request)
    {
        $sport=$request->input("sport_id");
        $location=$request->input("location_id");
        $location_sport=location_sport::create($request->all());
        return response()->json($location_sport,201);
    }

    public function show($id)
    {
        return location_sport::find($id);
    }

    public function update(Request $request,location_sport $location_sport)
    {
        $location_sport->update($request->all());
        return response()->json($location_sport,200);
    }

    public function destroy(location_sport $location_sport)
    {
        $location_sport->delete();
        return response()->json("{count: 1}",200);
 
    }

    public function getsport(Request $request)
    {   
        $id=$request->input((array)'id');
        $start_date=$request->input("start_date");
        $end_date=$request->input("end_date");
        $datetime1 = new DateTime($start_date);
        $datetime2 = new DateTime($end_date);
        $location_sport=DB::table("location_sport")
                                ->join('locations','location_sport.location_id', '=', 'locations.id')
                                //->join('sports','location_sport.sport_id' , '=', 'sports.id')
                                ->select('locations.name','location_sport.cost','locations.id_parinte','location_sport.start_date','location_sport.end_date')
                                ->whereIn("sport_id", $id)
                                ->where("start_date", "<=", $start_date)
                                ->where("end_date", ">=", $end_date)
                                ->orderby("cost", "asc")
                                ->get();
        $interval = $datetime1->diff($datetime2);
        $days = $interval->format('%a');
        return $location_sport;
        //  var_dump($date);
        //   var_dump($days);
        //  die;
    }


}
