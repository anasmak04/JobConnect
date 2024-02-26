<?php

namespace App\Http\Controllers\Representer;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileRepresenter extends Controller
{
    //

    public function index()
    {
        $profile = User::whereHas('roles', function ($query) {
            $query->where('name', 'Representer');
        })->with('company')->get();

        return view("candidat.candidat_profile", compact("profile"));
    }


}
