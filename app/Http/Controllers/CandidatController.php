<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class CandidatController extends Controller
{
    public function profile()
    {
        $user = auth()->user();
        return view('candidat.profile', compact('user'));
    }




    public function saveProfile(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'skills' => 'array',
        'formations' => 'array',
    ]);

    $user = auth()->user();

    $user->name = $request->name;
    $user->save();

    if ($request->has('skills')) {
        $user->skills()->syncWithoutDetaching($request->skills);
    }

    if ($request->has('formations')) {
        $user->formations()->syncWithoutDetaching($request->formations);
    }

    return redirect()->back()->with('success', 'Profile updated successfully.');
}

    public function index(Request $request)
{
    $user = auth()->user();

    if (!$user) {
        return redirect()->route('some.route')->with('error', 'No user found.');
    }

    $formations = Formation::all();
    $skills = Skill::all();

    $pendingOffers = $user->jobOffers()->wherePivot('offer_status', 'Pending')->get();

    $acceptedOffers = $user->jobOffers()->wherePivot('offer_status', 'Accepted')->get();

    return view('candidat.candidat_profile', compact('user', 'formations', 'skills', 'pendingOffers', 'acceptedOffers'));
}



    public function showRepresenterForm()
    {
        return view('candidat.representer_info_form');
    }

    
    public function saveRepresenterInfo(Request $request)
    {
        $validatedData = $request->validate([
            'company_name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'position' => 'required|string|max:255',
        ]);

        $user = User::first();

        $user->company_name = $validatedData['company_name'];
        $user->description = $validatedData['description'];
        $user->position = $validatedData['position'];
        $user->pending_role = 'Pending';

        $user->save();

        return redirect()->route('candidat.profile')->with('success', 'Representer information submitted successfully.');
    }
}
