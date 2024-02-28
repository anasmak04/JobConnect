<?php

namespace App\Http\Controllers\Recruiter;

use App\Http\Controllers\Controller;
use App\Models\Secteur;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class RecruiterController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     
     public function index(): Response
{
    $recruiter = Auth::user();
    $secteurs = Secteur::all();
    
    // Fetch the created job offers by the recruiter
    $createdJobOffers = $recruiter->createdJobOffers()->get();

    // Fetch the pending applications for the created job offers
    $pendingApplications = User::whereHas('jobOffers', function ($query) use ($createdJobOffers) {
        $query->whereIn('job_offer_id', $createdJobOffers->pluck('id'))
            ->where('offer_status', 'Pending'); // Correct usage of wherePivot
    })->get();

    return response()->view('recruiter.index', compact('recruiter', 'secteurs', 'createdJobOffers', 'pendingApplications'));
}

public function accept(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->jobOffers()->updateExistingPivot($request->job_offer_id, ['offer_status' => 'Accepted']);
        return redirect()->back()->with('success', 'Application accepted successfully.');
    }

    public function reject(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->jobOffers()->updateExistingPivot($request->job_offer_id, ['offer_status' => 'Rejected']);
        return redirect()->back()->with('success', 'Application rejected successfully.');
    }

    public function store(Request $request): RedirectResponse
{
    $request->validate([
        'name' => 'required|string',
        'email' => 'required|email|unique:users,email',
        'position' => 'required|string',
        'password' => 'required|string|min:8',
    ]);

    $representerCompanyId = Auth::user()->company_id;

    $recruiter = new User();
    $recruiter->name = $request->name;
    $recruiter->email = $request->email;
    $recruiter->position = $request->position;
    $recruiter->password = Hash::make($request->password);

    $recruiter->company_id = $representerCompanyId;

    $recruiter->save();

    $recruiter->roles()->attach(3); 

    return redirect()->route('user.profile.show', ["userId" => Auth::id()])->with('success', 'Recruiter created successfully!');
}

    public function showRecruiters()
    {
        // Fetch the users with the role 'recruiter' from the database
        $recruiters = User::whereHas('roles', function ($query) {
            $query->where('id', 3); // Assuming the role ID for recruiter is 3
        })->get();

        // Pass the recruiters data to the view
        return view('representer.representer_profile', ['recruiters' => $recruiters]);
    }


}
