<?php

namespace App\Http\Controllers\Recruiter;

use App\Http\Controllers\Controller;
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

    //  public function showProfile()
    //  {
    //      // Get the authenticated recruiter
    //      $recruiter = Auth::user();
 
    //      // Load any additional data if necessary
 
    //      // For now, assuming $recruiters is a collection of recruiters, you can fetch them as per your application logic
    //      $recruiters = User::whereHas('roles', function ($query) {
    //          $query->where('name', 'recruiter');
    //      })->get();
 
    //      // Return the recruiter profile view along with $recruiters data
    //      return view('recruiter.profile', compact('recruiter', 'recruiters'));
    //  }

     public function index(): Response
     {
         // Get the authenticated recruiter
         $recruiter = Auth::user();
 
         // Pass the recruiter data to the view and return the view
         return response()->view('recruiter.index', compact('recruiter'));
     }

    //  public function store(Request $request): RedirectResponse
    //  {
    //      // Validate the request data
    //      $request->validate([
    //          'name' => 'required|string',
    //          'email' => 'required|email|unique:users,email',
    //          'position' => 'required|string',
    //          'password' => 'required|string|min:8',
    //      ]);

    //      // Create a new User instance
    //      $recruiter = new User();
    //      $recruiter->name = $request->name;
    //      $recruiter->email = $request->email;
    //      $recruiter->position = $request->position;
    //      $recruiter->password = Hash::make($request->password);

    //      // Save the User instance to the database
    //      $recruiter->save();

    //      $recruiter->roles()->attach(3);

    //      // Redirect the user after successful creation
    //      return redirect()->route('user.profile.show', ["userId" => Auth::id()])->with('success', 'Recruiter created successfully!');
    //  }

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
