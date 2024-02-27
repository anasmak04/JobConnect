<?php

namespace App\Http\Controllers\Offers;

use App\Http\Controllers\Controller;
use App\Models\JobOffer;
use App\Models\User;
use Illuminate\Http\Request;

class JobOfferController extends Controller
{


  


    public function index(Request $request)
    {
        $searchTerm = $request->input('searchTerm');
          if($searchTerm){
             $jobOffers = JobOffer::where('title', 'LIKE', "%{$searchTerm}%")
                 ->OrWhere('description', 'LIKE', "%{$searchTerm}%")->get();
          }
       else {
        $user = User::find(auth()->id());
        $userJobOffers = $user->jobOffers()->withPivot('offer_status')->get()->keyBy('id');
        $jobOffers = JobOffer::with(['company', 'secteur'])->get();
        
       }
        return view('jobOffers.index', compact('jobOffers', "searchTerm", "user", "userJobOffers"));
    }


    public function show(JobOffer $job_offer)
    {
        $user = auth()->user();
        $userJobOffer = $user->jobOffers()->find($job_offer->id);
        
        return view('jobOffers.show', compact('job_offer', 'userJobOffer'));
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
    // Validate the incoming request if needed

    // Store the application in the pivot table
    auth()->user()->jobOffers()->attach($request->job_offer_id, ['offer_status' => 'Pending']);

    // Redirect back or to a success page
    return redirect()->back()->with('success', 'Application submitted successfully.');
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
