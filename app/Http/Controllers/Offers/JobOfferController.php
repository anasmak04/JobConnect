<?php

namespace App\Http\Controllers\Offers;

use App\Http\Controllers\Controller;
use App\Models\JobOffer;
use Illuminate\Http\Request;

class JobOfferController extends Controller
{





    public function index(Request $request)
    {
        $searchTerm = $request->input('searchTerm');
          if($searchTerm){
             $jobOffers = JobOffer::where('title', 'LIKE', "%{$searchTerm}%")
                 ->orWhere('description', 'LIKE', "%{$searchTerm}%")
                 ->orWhereHas('company', function($query) use ($searchTerm) {
                     $query->where('name', 'LIKE', "%{$searchTerm}%");
                 })

                 ->orWhereHas('city', function($item) use($searchTerm) {
                     $item->where('name', "LIKE" , "%{$searchTerm}%");
                 })->get();
          }
       else {
           $jobOffers = JobOffer::with('company', 'secteur')->get();
       }
        return view('jobOffers.index', compact('jobOffers', "searchTerm"));
    }


    public function show(JobOffer $job_offer)
{
    return view('jobOffers.show', compact('job_offer'));
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
