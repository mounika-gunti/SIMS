<?php

namespace App\Http\Controllers\Masters;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeMasterRequest;
use App\Models\Employee;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class EmployeeMasterController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('masters.employee_master.index', compact('employees'));
    }

    public function create()
    {
        $employees = Employee::all();
        return view('masters.employee_master.create', compact('employees'));
    }


    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        return view('masters.employee_master.edit', compact('employee'));
        if ($request->hasFile('image_path')) {
            $file = $request->file('image_path');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $path = '';

            if (!is_dir(public_path($path))) {
                mkdir(public_path($path), 0755, true);
            }

            $file->move(public_path($path), $fileName);
            $employee->image_path = $path . '' . $fileName;
        } else {
            $employee->image_path = '';
        }
    }
    public function show()
    {
        //
    }

    public function store(EmployeeMasterRequest $request)
    {
        // dd($request->all());
        $request->validated();

        $employee = new Employee();
        $employee->first_name = $request->first_name;
        $employee->phone_number = $request->phone_number;
        $employee->whatsapp_number = $request->whatsapp_number;

        if ($request->hasFile('image_path')) {
            $file = $request->file('image_path');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $path = '';

            if (!is_dir(public_path($path))) {
                mkdir(public_path($path), 0755, true);
            }

            $file->move(public_path($path), $fileName);
            $employee->image_path = $path . '' . $fileName;
        } else {
            $employee->image_path = '';
        }

        $employee->save();

        $user = Users::create([
            'first_name' => $request->first_name,
            'username' => $request->first_name,
            'password' => Hash::make('123456'),
        ]);

        $employee->user_id = $user->id;
        $employee->save();

        return redirect()->route('employee_master.index')->with('success', 'Employee and user created successfully.');
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


    public function deactivate($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->deleted_at = Carbon::now();
        $employee->save();

        return redirect()->route('employee_master.index')->with('success', 'Employee Master Deleted Successfully');
    }

    public function active($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->deleted_at = null;
        $employee->save();
        return redirect()->back()->with('success', 'Employee Master activated Successfully .');
    }
}