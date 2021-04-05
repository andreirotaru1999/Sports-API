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
        return LocationType::create($request->all());
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
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
        ]);
        $LocationType = LocationType::find($id);
        $LocationType->update($request->all());
        return  $LocationType;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LocationType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return LocationType::destroy($id);
    }
}
