<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Models\City;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Models\User;

class RepresenterController extends Controller
{


    public function index()
    {
        $cities = City::all();
        return view("representer.representer-complete-info", compact("cities"));
    }


    public function create()
    {
        return view('representers.create');
    }

        public function store(CompanyRequest $request)
        {
           $company=  Company::create($request->validated());

            if ($request->hasFile('image')) {
                $company->addMediaFromRequest('image')->toMediaCollection();
            }
            return redirect()->route('candidat.profile ');
        }



}
