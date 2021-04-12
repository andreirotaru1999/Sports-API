<?php

namespace App\Http\Controllers;

use App\Models\sport;
use App\Models\location;
use App\Models\location_sport;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class LocationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return location::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $location=location::create($request->all());
        return response()->json($location,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\location  $location
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return location::find($id);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\location  $location
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, location $location)
    {
        $request->validate([
            'name'=>'required',
        ]);

        $location->update($request->all());
        return response()->json($location,200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\location  $location
     * @return \Illuminate\Http\Response
     */
    public function destroy(location $location)
    {
        $location->delete();
        return response()->json("{count: 1}",200);
    }

    public function getsport(Request $request)
    {   
        $id=$request->input("id");
        $date_start=$request->input("date_start");
        $date_end=$request->input("date_end");
        $location_sport=DB::table("location_sport")
                                ->where("sport_id","=",$id)
                                ->get();
        echo "hello";
        var_dump($location_sport);
        die;
    
    }
}
