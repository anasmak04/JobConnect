<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $cities = City::all();
        return view("", compact("cities"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        City::create($request->all());
        return redirect()->route("");
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        return view("");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request , City $city)
    {
        //
        $city->update($request->all());
        return redirect()->route("");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(City $city)
    {
        $city->delete();
        return redirect()->route("");
    }


}
