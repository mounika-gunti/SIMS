<?php

namespace App\Http\Controllers\Parties;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use App\Models\BranchMaster;
use App\Models\Designation;

class EmployeeMasterController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('parties.employee.index', compact('employees'));
    }

    public function create()
    {

        return view('parties.employee.create');
    }


    public function edit($id)
    {
        $employee = Employee::findOrFail($id);

        return view('parties.employee.edit', compact('employee',));
    }

    public function show($id)
    {

        $employee = Employee::findOrFail($id);

        return view('parties.employee.show', compact('employee',));
    }

    public function store(EmployeeRequest $request)
    {
        // dd($request->all());
        $validated = $request->validated();

        $employee = new Employee();
        $employee->first_name = $validated['first_name'];
        $employee->phone_number = $validated['phone_number'];
        $employee->whatsapp_number = $validated['whatsapp_number'];
        $employee->address = $validated['address'];
        $employee->designation_id = $validated['designation_id'];
        $employee->branch_id = $validated['branch_id'];
        $employee->aadhar_number = $validated['aadhar_number'];
        if ($request->hasFile('aadhar_attach_link')) {
            $employee->aadhar_attach_link = $request->file('aadhar_attach_link')->store('aadhar');
        } else {
            $employee->aadhar_attach_link = null;
        }
        $employee->pan_number = $validated['pan_number'];
        if ($request->hasFile('pan_attach_link')) {
            $employee->pan_attach_link = $request->file('pan_attach_link')->store('pan');
        } else {
            $employee->pan_attach_link = null;
        }
        $employee->bank_name = $validated['bank_name'];
        $employee->branch_name = $validated['branch_name'];
        $employee->ifsc = $validated['ifsc'];
        $employee->account_no = $validated['account_no'];
        $employee->emergency_contact_name = $validated['emergency_contact_name'];
        $employee->emergency_contact_phone_number = $validated['emergency_contact_phone_number'];
        $employee->emergency_contact_relationship = $validated['emergency_contact_relationship'];

        $employee->save();

        return redirect()->route('employee.index')->with('success', 'Employee created successfully.');
    }

    public function update(EmployeeRequest $request, $id)
    {

        $employee = Employee::findOrFail($id);


        $validated = $request->validated();

        $employee->first_name = $validated['first_name'];
        $employee->phone_number = $validated['phone_number'];
        $employee->whatsapp_number = $validated['whatsapp_number'];
        $employee->address = $validated['address'];
        $employee->designation_id = $validated['designation_id'];
        $employee->branch_id = $validated['branch_id'];
        $employee->aadhar_number = $validated['aadhar_number'];

        if ($request->hasFile('aadhar_attach_link')) {
            $employee->aadhar_attach_link = $request->file('aadhar_attach_link')->store('aadhar');
        } else {
            $employee->aadhar_attach_link = null;
        }

        if ($request->hasFile('pan_attach_link')) {
            $employee->pan_attach_link = $request->file('pan_attach_link')->store('pan');
        } else {
            $employee->pan_attach_link = null;
        }
        $employee->pan_number = $validated['pan_number'];
        $employee->bank_name = $validated['bank_name'];
        $employee->branch_name = $validated['branch_name'];
        $employee->ifsc = $validated['ifsc'];
        $employee->account_no = $validated['account_no'];
        $employee->emergency_contact_name = $validated['emergency_contact_name'];
        $employee->emergency_contact_phone_number = $validated['emergency_contact_phone_number'];
        $employee->emergency_contact_relationship = $validated['emergency_contact_relationship'];


        $employee->save();


        return redirect()->route('employee.index')->with('success', 'Employee updated successfully.');
    }
}
