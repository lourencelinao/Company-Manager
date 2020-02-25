<?php

namespace App\Http\Controllers;

use App\Company;
use App\Employees;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function create(){
        return view('company/create');
    }

    public function store(){
        $data = request()->validate([
            //'another' => '',
            'name' => 'required',
            'email' => 'required',
            'website' => 'required',
            'address' => 'required',
            'image' => ['required', 'image'],
        ]);

        $imagePath = request('image')->store('companylogos', 'public');

        Auth::user()->company()->create([ 
            'name' => $data['name'],
            'email' => $data['email'],
            'website' => $data['website'],
            'address' => $data['address'],
            'image' => $imagePath,
        ]); 

        return redirect('/home');
        // \App\Company::create($data);
    }

    public function edit(\App\Company $company){

        return view('company.edit', compact('company'));
    }

    public function update(\App\Company $company){

        $data = request()->validate([
            'name' => 'required',
            'email' => 'required',
            'website' => ['required', 'url'],
            'address' => 'required',
            'image' => 'image',
        ]);
        $company->update($data);

        return redirect('/home');

    }

    public function show(\App\Company $company){

        $employees = DB::table('employees')->where('company_id', $company->id)->get();
        return view('company.show', compact(['company', 'employees']));
    }

    public function destroy(\App\Company $company){
        Employees::where('company_id', $company->id)->delete();
        Company::find($company->id)->delete();
        return redirect('/home');
    }

}
