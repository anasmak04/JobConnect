<?php

namespace App\Http\Controllers\Representer;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileRepresenter extends Controller
{
    //


    public function show($userId)
{
    $profile = User::where('id', $userId)
        ->whereHas('roles', function ($query) {
            $query->where('name', 'Representer');
        })->with('company')->first();

        
    $recruiters = User::whereHas('roles', function ($query) {
        $query->where('name', 'recruiter');
    })->get();

    
    return view("representer.representer_profile", compact("profile", "recruiters"));
}


}
