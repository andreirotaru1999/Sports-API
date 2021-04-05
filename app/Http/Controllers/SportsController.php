<?php

namespace App\Http\Controllers;

use App\Models\sport;
use Illuminate\Http\Request;

class SportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return sport::all();
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
            'cost'=>'required',
        ]);

        return sport::create($request->all());
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\sport  $sport
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return sport::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\sport  $sport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, sport $sport)
    {
        $request->validate([
            'name'=>'required',
            'cost'=>'required',
        ]);
        $sport = sport::find($id);
        $sport->update($request->all());
        return  $sport;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\sport  $sport
     * @return \Illuminate\Http\Response
     */
    public function destroy(sport $sport)
    {
        return sport::destroy($id);
 
    }
}
