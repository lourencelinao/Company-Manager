<?php

namespace App\Http\Controllers;

use App\Employees;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeesController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(\App\Company $company){
        return view('employee.create', compact('company'));
    }

    public function store(\App\Company $company){
        $data = request()->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);
        
        $company->employees()->create($data);
        return redirect('/company/'.$company->id);
    }

    public function edit(\App\Employees $employee){

        return view('employee.edit', compact('employee'));
    }

    public function update(\App\Employees $employee){
        $data = request()->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);

        $employee->update($data);
        return redirect('/company/'. $employee->company_id);
    }

    public function destroy(\App\Employees $employee){
        Employees::find($employee->id)->delete();
        return redirect('/company/'. $employee->company_id);
    }
}
