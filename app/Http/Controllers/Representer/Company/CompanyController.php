<?php

namespace App\Http\Controllers\Representer\Company;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{

    public function showJobOffers(Company $company)
    {
        $jobOffers = $company->jobOffers()->with('secteur')->get();
        return view('jobOffers.index', compact('jobOffers'));
    }


    public function index(Request $request)
    {
        $cities = City::all();

        if ($request->has('city_id')) {
            $companies = Company::where('city_id', $request->city_id)->get();
        } else {
            $companies = Company::all();
        }

        return view('companies.index', compact('companies', 'cities'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        Company::create($request->all());
        return redirect()->route("");
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        return view("");
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company)
    {
        //
        $company->update($request->all());
        return redirect()->route("");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->route("");
    }

}
