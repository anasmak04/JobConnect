<?php

namespace App\Http\Controllers\Admin\City;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $cities = City::all();
        $userscount = User::count();
        $citiescount = City::count();
        return view("admin.city.index", compact("cities", "userscount", "citiescount"));
    }


    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        City::create($request->all());
        return redirect()->route("city.index");
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request , City $city)
    {
        $city->update($request->all());
        return redirect()->route("city.index");
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(City $city)
    {
        $city->delete();
        return redirect()->route("city.index");
    }


}
