<?php

namespace App\Http\Controllers\Offers;

use App\Http\Controllers\Controller;
use App\Models\JobOffer;
use Illuminate\Http\Request;

class JobOfferController extends Controller
{

    public function index()
    {
        $joboffers = JobOffer::all();
        return view("", compact("joboffers"));
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
        JobOffer::create($request->all());
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
    public function update(Request $request , JobOffer $jobOffer)
    {
        //
        $jobOffer->update($request->all());
        return redirect()->route("");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobOffer $jobOffer)
    {
        $jobOffer->delete();
        return redirect()->route("");
    }


}
