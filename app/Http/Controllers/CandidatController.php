<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Services\GenericService;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class CandidatController extends Controller
{
    public function index(Request $request){
        // Fetch a user for testing. Here, we're just getting the first user.
    // In a real application, you might want to use authentication to get the current user
    // or use a specific criterion to fetch the user.
    $user = User::first();

    // Make sure to handle the case where there might not be any users in the database.
    if (!$user) {
        // Handle the error appropriately - maybe redirect with an error message,
        // or show a default user object.
        return redirect()->route('some.route')->with('error', 'No user found.');
    }

    // Pass the user object to the view
    return view('candidat.candidat_profile', compact('user'));
    }

// Method to show the form
    public function showRepresenterForm()
    {
        return view('candidat.representer_info_form');
    }

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