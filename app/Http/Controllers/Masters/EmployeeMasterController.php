<?php

namespace App\Http\Controllers\Masters;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use Illuminate\Http\Request;

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

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            "first_name" => "required|unique:employees,first_name",
            "phone_number" => "required|numeric",
        ]);

        $employee = new Employee();
        $employee->first_name = $request->first_name;
        $employee->phone_number = $request->phone_number;
        $employee->whatsapp_number = $request->whatsapp_number;

        $employee->save();

        return redirect()->route('employee_master.index')->with('success', 'Employee Master created successfully.');
    }

    public function update(EmployeeRequest $request, $id)
    {
        $employee = Employee::findOrFail($id);
        $validated = $request->validated();

        $employee->first_name = $validated['first_name'];
        $employee->phone_number = $validated['phone_number'];
        $employee->whatsapp_number = $validated['whatsapp_number'];

        $employee->save();

        return redirect()->route('employee_master.index')->with('success', 'Employee Master updated successfully.');
    }
}