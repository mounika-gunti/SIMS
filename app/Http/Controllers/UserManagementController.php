<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Http\Requests\UserRequest;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

class UserManagementController extends Controller
{
    public function index()
    {
        $users = Users::all();
        return view('masters.user_management.index', compact('users'));
    }
    public function create()
    {
        return view('masters.user_management.create');
    }
    public function store(UserRequest $request)
    {

        $validatedData = $request->validated();
        $validatedData['password'] = bcrypt($validatedData['password']);

        $user = Users::create($validatedData);
        return redirect()->route('user_management.index')->with('success', 'User created successfully.');
    }

    public function view($id)
    {
        $user = Users::findOrFail($id);
        return view('masters.user_management.view', compact('user'));
    }

    // public function edit($id)
    // {
    //     $user = Users::findOrFail($id);
    //     return view('masters.user_management.edit', compact('user'));
    // }

    public function update(UserRequest $request, $id)
    {

        $validatedData = $request->validated();

        if (!empty($validatedData['password'])) {
            $validatedData['password'] = bcrypt($validatedData['password']);
        } else {
            unset($validatedData['password']);
        }
        $user = Users::findOrFail($id);

        $user->update($validatedData);
        return redirect()->route('user_management.manage_user')->with('success', 'User updated successfully.');
    }

    public function delete($id)
    {
        $user = Users::findOrFail($id);
        $user->delete();

        return redirect()->route('user_management.manage_user')->with('success', 'User deleted successfully.');
    }


    public function manage()
    {
        $users = Users::all();
        return view('masters.user_management.manage_user', compact('users'));
    }

    public function edit_user($id)
    {
        $users = Users::findOrFail($id);
        return view('masters.user_management.manage_user', compact('users'));
    }

    public function update_user(UserRequest $request, $id)
    {
        $validatedData = $request->validated();

        if (!empty($validatedData['password'])) {
            $validatedData['password'] = bcrypt($validatedData['password']);
        } else {
            unset($validatedData['password']);
        }

        $user = Users::findOrFail($id);
        $user->update($validatedData);

        return redirect()->route('user_management.index')->with('success', 'User updated successfully.');
    }

    public function password($id)
    {
        return view('masters.user_management.change_password', compact('id'));
    }

    public function updatePassword(Request $request, $id)
    {
        $validatedData = $request->validate([
            'new_password' => 'required|min:6|confirmed',
        ]);

        $user = Users::findOrFail($id);

        $user->password = bcrypt($validatedData['new_password']);
        $user->save();

        return redirect()->route('user_management.manage_user')->with('success', 'Password updated successfully.');
    }
    public function permission()
    {
        return view('masters.user_management.user_permission');
    }

    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
}