<?php


namespace App\Http\Controllers\Offers;

use App\Http\Controllers\Controller;
use App\Models\JobOffer;
use App\Models\City;
use App\Models\Secteur;
use App\Models\User;
use Illuminate\Http\Request;

class JobOfferController extends Controller
{


    public function index(Request $request)
    {
        $searchTerm = $request->input('searchTerm');
        $secteur_id = $request->input('secteur_id');
        $secteurs = Secteur::all(); // Consider if this is necessary based on your UI needs.
        $user = User::find(auth()->id()); // Moved outside to ensure it's defined for the view.

        // Start with a basic query that can be modified based on conditions.
        $jobOffersQuery = JobOffer::query();

        if ($searchTerm) {
            $jobOffersQuery->where('title', 'LIKE', "%{$searchTerm}%")
                ->orWhere('description', 'LIKE', "%{$searchTerm}%");
        }

        if ($secteur_id) {
            $jobOffersQuery->where("secteur_id", $secteur_id);
        }

        // If no specific filters are applied, eager load relationships (optional based on your needs).
        if (!$searchTerm && !$secteur_id) {
            $jobOffersQuery->with(['company', 'secteur']);
        }

        $jobOffers = $jobOffersQuery->get();
        $userJobOffers = $user->jobOffers()->withPivot('offer_status')->get()->keyBy('id'); // Consider fetching this conditionally if it's heavy.

        return view('jobOffers.index', compact('jobOffers', 'searchTerm', 'user', 'userJobOffers', 'secteurs'));
    }



    public function show(JobOffer $job_offer)
    {
        $user = auth()->user();
        $userJobOffer = $user->jobOffers()->find($job_offer->id);
        return view('jobOffers.show', compact('job_offer', 'userJobOffer'));
    }




    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        auth()->user()->jobOffers()->attach($request->job_offer_id, ['offer_status' => 'Pending']);
        return redirect()->back()->with('success', 'Application submitted successfully.');
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JobOffer $jobOffer)
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

