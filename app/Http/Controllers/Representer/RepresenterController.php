<?php

namespace App\Http\Controllers\Representer;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyRequest;
use App\Models\City;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;

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
            return redirect()->route('candidat.profile');
        }





    public function updateRepresenterCompany(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'website' => 'nullable|url',
            'city_id' => 'required|exists:cities,id',
        ]);


        $company = Company::create($validatedData);

        $user->company_id = $company->id;
        $user->save();

        return redirect()->route("user.profile.show", ['userId' => $user->id]);
    }


}
