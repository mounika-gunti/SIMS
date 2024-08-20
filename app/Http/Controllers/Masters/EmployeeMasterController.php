<?php

namespace App\Http\Controllers\Masters;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeMasterRequest;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class EmployeeMasterController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('masters.employee_master.index', compact('employees'));
    }

    public function create()
    {
        return view('masters.employee_master.create');
    }


    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        return view('masters.employee_master.edit', compact('employee'));
    }
    public function show()
    {
     //
    }

    public function store(EmployeeMasterRequest $request)
    {
        $request->validated();

        $employee = new Employee();
        $employee->first_name = $request->first_name;
        $employee->phone_number = $request->phone_number;
        $employee->whatsapp_number = $request->whatsapp_number;

        $employee->save();

        return redirect()->route('employee_master.index')->with('success', 'Employee Master created successfully.');
    }

    public function update(EmployeeMasterRequest $request, $id)
    {
        $employee = Employee::findOrFail($id);
        $request->validated();

        $employee->first_name = $request->first_name;
        $employee->phone_number = $request->phone_number;
        $employee->whatsapp_number = $request->whatsapp_number;

        $employee->save();

        return redirect()->route('employee_master.index')->with('success', 'Employee Master updated successfully.');
    }


        public function destroy( $id)
        {
            $product = Employee::findOrFail($id);
            $product->deleted_at = Carbon::now();
            $product->save();

            return redirect()->route('employee_master.index')->with('status','Employee Master Deleted Successfully');
        }



}