<?php

namespace App\Http\Controllers\Representer;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileRepresenter extends Controller
{
    //


//     public function show($userId)
// {
//     $profile = User::where('id', $userId)
//         ->whereHas('roles', function ($query) {
//             $query->where('name', 'Representer');
//         })->with('company')->first();


//     $recruiters = User::whereHas('roles', function ($query) {
//         $query->where('name', 'recruiter');
//     })->get();


//     return view("representer.representer_profile", compact("profile", "recruiters"));
// }

public function show($userId)
{
    // Retrieve the representative's profile
    $profile = User::where('id', $userId)
        ->whereHas('roles', function ($query) {
            $query->where('name', 'Representer');
        })
        ->with('company')
        ->first();

    // Retrieve recruiters belonging to the same company as the representative and have the "recruiter" role
    $recruiters = User::whereHas('roles', function ($query) {
            $query->where('name', 'recruiter');
        })
        ->where('company_id', $profile->company_id) // Filter by the same company as the representative
        ->get();

    return view("representer.representer_profile", compact("profile", "recruiters"));
}



}
