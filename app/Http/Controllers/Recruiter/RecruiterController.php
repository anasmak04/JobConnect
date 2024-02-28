<?php

namespace App\Http\Controllers\Recruiter;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
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
             'email' => 'required|email|unique:users,email',
             'position' => 'required|string',
             'password' => 'required|string|min:8',
         ]);
     
         // Create a new User instance
         $recruiter = new User();
         $recruiter->name = $request->name;
         $recruiter->email = $request->email;
         $recruiter->position = $request->position;
         $recruiter->password = Hash::make($request->password); 
     
         // Save the User instance to the database
         $recruiter->save();
     
         $recruiter->roles()->attach(3);
     
         // Redirect the user after successful creation
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
