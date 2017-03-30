<?php

namespace Keys\Http\Controllers;

use Illuminate\Http\Request;
use Keys\Models\Employee;
use Keys\Models\Key;

class EmployeeController extends Controller
{

    protected $employees;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Employee $employee)
    {
        $this->middleware('auth');

        $this->employees = $employee;
    }


    public function index()
    {


        $sortBy = \Request::get('sortBy');
        $direction = \Request::get('direction');

        $employee = $this->employees->getPaginated(compact('sortBy','direction', 'search'));

        return view('employee.index')
            ->withData($employee);
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

        return view('employee.edit')
            ->withEmployee($employee);
    }

    public function update(Employee $employee, Request $request)
    {

        $this->validate($request, [
//            'company_name' => 'max:255|unique:employees,id,' . $employee->id,
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required_without:company_name',
            'phone' => 'required_with:company_name'
        ]);

        $employee->update($request->all());

        return redirect()->route('employee')->with('message', 'User Updated.');
    }

    public function attach(Employee $employee, Request $request)
    {

        $this->validate($request, [
                'key_id' => 'required'
        ]);

        $keys = $request->all();

        $employee->keys()->attach($keys['key_id'], ['date_out' => date('Y-m-d')]);

        $info = ['message' => 'Cannot add the same service type twice. '];

        return \Response::json(array(
            'error' => false,
            'data' => $info
        ));
    }

    public function detach(Employee $employee, Key $key)
    {

        $employee->keys()->detach($key);

        return redirect()->back()->with('message', 'Key Removed.');
    }

    public function destroy(Employee $employee)
    {
        if($employee->keys()->count() > 0)
        {
            return back()->withErrors('Employee has keys attached. Please remove keys before deleting Employee.');
        }

        $employee->delete();

        return redirect()->route('employee')->with('message', 'Employee deleted.');

    }


}
