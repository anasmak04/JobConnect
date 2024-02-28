<?php

namespace App\Http\Controllers\Recruiter;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class RecruiterController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:recruiters',
            'position' => 'required|string',
            // Add more validation rules as needed
        ]);

        // Create a new Recruiter instance
        $recruiter = new User();
        $recruiter->name = $request->name;
        $recruiter->email = $request->email;
        $recruiter->position = $request->position;
        // Set other attributes as needed

        // Save the Recruiter instance to the database
        $recruiter->save();

        // Redirect the user after successful creation
        return redirect()->route('recruiter.create')->with('success', 'Recruiter created successfully!');
    }

    public function showRecruiters()
    {
        // Fetch the users with the role 'recruiter' from the database
        $recruiters = User::whereHas('roles', function ($query) {
            $query->where('name', 'recruiter');
        })->get();

        // Pass the recruiters data to the view
        return view('representer.representer_profile', ['recruiters' => $recruiters]);
    }
}
