<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sport;
use App\Models\location;
use App\Models\location_sport;
use Illuminate\Support\Facades\DB;

class Location_sports_Controller extends Controller
{
    public function getsport(Request $request)
    {   
        $id=$request->input((array)'id');
        $start_date=$request->input("start_date");
        $end_date=$request->input("end_date");
        $location_sport=DB::table("location_sport")
                                ->whereIn("sport_id", $id)
                                ->where("start_date", "<=", $start_date)
                                ->where("end_date", ">=", $end_date)
                                ->orderby("cost", "asc")
                                ->get();
        return $location_sport;
        //  var_dump($date);
        //   var_dump($id);
        //  die;
    }

    public function assign(Request $request)
    {
        $sport=$request->input("sport_id");
        $location=$request->input("location_id");
        $location_sport=location_sport::create($request->all());
        return response()->json($location_sport,201);
    }

}
