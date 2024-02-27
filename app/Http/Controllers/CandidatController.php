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
    // Method to display the profile information
    public function profile()
    {
        // Retrieve the authenticated user
        $user = auth()->user();

        // Return the view with the user's profile information
        return view('candidat.profile', compact('user'));
    }

    // public function editProfile()
    // {
    //     // Retrieve the authenticated user
    //     $user = auth()->user();
        
    //     // Fetch skills and formations from the database
    //     $skills = Skill::all();
    //     $formations = Formation::all();

    //     // Return the view with the user's profile information and available skills/formations
    //     return view('candidat.profile', compact('user', 'skills', 'formations'));
    // }

    // // Method to save the updated profile information
    // public function updateProfile(Request $request)
    // {
    //     // Validate the request
    //     $validatedData = $request->validate([
    //         // Define validation rules for other fields
    //         'skills.*' => 'exists:skills,id', // Validate that the selected skills exist in the database
    //         'formations.*' => 'exists:formations,id', // Validate that the selected formations exist in the database
    //     ]);

    //     // Retrieve the authenticated user
    //     $user = auth()->user();

    //     // Update the user's profile information
    //     $user->update($validatedData);

    //     // Redirect back to the profile page with a success message
    //     return redirect()->route('candidat.profile')->with('success', 'Profile updated successfully.');
    // }

    // Method to fetch the authenticated candidate along with their skills and formations

    
public function saveProfile(Request $request)
{
    // Validate the form data
    $request->validate([
        'name' => 'required|string|max:255',
        'skills' => 'array',
        'formations' => 'array',
    ]);

    // Get the authenticated user
    $user = auth()->user();

    // Update the user's name
    $user->name = $request->name;
    $user->save();

    // Sync skills
    if ($request->has('skills')) {
        $user->skills()->sync($request->skills);
    }

    // Sync formations
    if ($request->has('formations')) {
        $user->formations()->sync($request->formations);
    }

    // Redirect back with a success message
    return redirect()->back()->with('success', 'Profile updated successfully.');
}

    public function index(Request $request)
{
    // Retrieve the authenticated user
    $user = auth()->user();

    if (!$user) {
        return redirect()->route('some.route')->with('error', 'No user found.');
    }

    // Fetch formations and skills separately
    $formations = Formation::all();
    $skills = Skill::all();

    // Compact all the variables into the view
    return view('candidat.candidat_profile', compact('user', 'formations', 'skills'));
}


    // Method to show the form for entering representer information
    public function showRepresenterForm()
    {
        return view('candidat.representer_info_form');
    }

    // Method to save representer information
    public function saveRepresenterInfo(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'company_name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'position' => 'required|string|max:255',
        ]);

        $user = User::first();

        $user->company_name = $validatedData['company_name'];
        $user->description = $validatedData['description'];
        $user->position = $validatedData['position'];
        $user->pending_role = 'Pending'; // Set the pending_role to "Pending"
    
        $user->save();

        // Redirect the user with a success message
        return redirect()->route('candidat.profile')->with('success', 'Representer information submitted successfully.');
    }
}
