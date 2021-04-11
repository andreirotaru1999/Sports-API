<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LocationType;

class LocationTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return LocationType::all();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
        ]);
        $LocationType=LocationType::create($request->all());
        return response()->json($LocationType,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LocationType
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return LocationType::find($id);
    }

    /**
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LocationType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LocationType $LocationType)
    {
        $request->validate([
            'name'=>'required',
        ]);

        $LocationType->update($request->all());
        return response()->json($LocationType,200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LocationType
     * @return \Illuminate\Http\Response
     */
    public function destroy(LocationType $LocationType)
    {
        $LocationType->delete();
        return response()->json("{count: 1}",200);
    }
}
