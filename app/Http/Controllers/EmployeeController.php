<?php

namespace Keys\Http\Controllers;

use Illuminate\Http\Request;
use Keys\Models\Employee;

class EmployeeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        return view('employee.index')
            ->withData(Employee::all());
    }

    public function create()
    {
        return view('employee.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'company_name' => 'unique:employees|max:255',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required_without:company_name',
            'phone' => 'required_with:company_name'
        ]);

        Employee::create($request->all());

        return redirect()->route('employee')->with('message', 'User Added.');
    }

    public function edit(Employee $employee)
    {
//        $data = Employee::with('keys')->findOrFail($employee->id)->get();
//        dd($data);

        return view('employee.edit')
            ->withEmployee($employee);
    }

    public function update(Employee $employee, Request $request)
    {

        $this->validate($request, [
            'company_name' => 'max:255|unique:employees,id,' . $employee->id,
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required_without:company_name',
            'phone' => 'required_with:company_name'
        ]);

        $employee->update($request->all());

        return redirect()->route('employee')->with('message', 'User Updated.');
    }
}
