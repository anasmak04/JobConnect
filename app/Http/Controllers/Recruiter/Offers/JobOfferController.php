<?php


namespace App\Http\Controllers\Recruiter\Offers;

use App\Http\Controllers\Controller;
use App\Models\JobOffer;
use App\Models\User;
use Illuminate\Http\Request;

class JobOfferController extends Controller
{

    public function index(Request $request)
{
    $searchTerm = $request->input('searchTerm');
    if ($searchTerm) {
        $jobOffers = JobOffer::where('title', 'LIKE', "%{$searchTerm}%")
            ->orWhere('description', 'LIKE', "%{$searchTerm}%")->get();
    } else {
        $user = User::find(auth()->id());
        $userJobOffers = $user->jobOffers()->withPivot('offer_status')->get()->keyBy('id');
        $jobOffers = JobOffer::with(['company', 'secteur'])->get();
    }
    $secteurs = \App\Models\Secteur::all(); // Fetch all secteurs
    return view('jobOffers.index', compact('jobOffers', 'searchTerm', 'user', 'userJobOffers', 'secteurs'));
}

public function recruiterOffer(Request $request)
{
    // Validate the form data
    $validatedData = $request->validate([
        'title' => 'required|string',
        'description' => 'required|string',
        'secteur_id' => 'required|exists:secteurs,id',
        // 'location' => 'required|string',
        'type' => 'required|string',
        'salary' => 'required|numeric',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after:start_date',
    ]);

    $recruiterId = auth()->id(); 
    $companyId = auth()->user()->company_id; 

    $jobOffer = JobOffer::create([
        'title' => $validatedData['title'],
        'description' => $validatedData['description'],
        'secteur_id' => $validatedData['secteur_id'],
        'type' => $validatedData['type'],
        'salary' => $validatedData['salary'],
        'start_date' => $validatedData['start_date'],
        'end_date' => $validatedData['end_date'],
        'author_id' => $recruiterId, 
        'company_id' => $companyId, 
    ]);

    return back()->with('success', 'Job offer created successfully!');
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

