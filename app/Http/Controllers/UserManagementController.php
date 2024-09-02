<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Menus;
use App\Models\UserMenus;
use App\Http\Requests\UserRequest;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserManagementController extends Controller
{
    public function index()
    {
        $users = User::all();
        $menus = Menus::all();
        return view('masters.user_management.index', compact('users', 'menus'));
    }
    public function create()
    {
        $users = User::all();
        return view('masters.user_management.create', compact('users'));
    }
    public function store(UserRequest $request)
    {
        // dd($request->all());
        $validatedData = $request->validated();

        $validatedData['password'] = bcrypt($validatedData['password']);

        $user = new User($validatedData);


        if ($request->hasFile('image_path')) {
            $file = $request->file('image_path');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $path = '';


            if (!is_dir(public_path($path))) {
                mkdir(public_path($path), 0755, true);
            }


            $file->move(public_path($path), $fileName);
            $user->image_path = $path . '' . $fileName;
        } else {
            $user->image_path = '';
        }

        $user->save();
        $menus = Menus::all();
        // dd($menus);

        foreach ($menus as $menu) {
            UserMenus::create([
                'user_id' => $user->id,
                'menu_id' => $menu->id,
                'is_alloted' => 0,
                'all' => 0,
                'add' => 0,
                'edit' => 0,
                'view' => 0,
                'delete' => 0,
            ]);
        }

        return redirect()->route('user_management.index')->with('success', 'User added successfully!');
    }


    public function view($id)
    {
        $user = User::findOrFail($id);
        return view('masters.user_management.view', compact('user'));
    }

    // public function edit($id)
    // {
    //     $user = Users::findOrFail($id);
    //     return view('masters.user_management.edit', compact('user'));
    // }

    public function update(UserRequest $request, $id)
    {

        // dd($request->all());
        $validatedData = $request->validated();

        if (!empty($validatedData['password'])) {
            $validatedData['password'] = bcrypt($validatedData['password']);
        } else {
            unset($validatedData['password']);
        }

        $user = User::findOrFail($id);

        if ($request->hasFile('image_path')) {
            $file = $request->file('image_path');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $path = '';
            $file->move(public_path($path), $fileName);
            $validatedData['image_path'] = $fileName;


            if ($user->image_path && file_exists(public_path($user->image_path))) {
                unlink(public_path($user->image_path));
            }
        }

        $user->update($validatedData);

        return redirect()->route('user_management.manage_user')->with('success', 'User updated successfully.');
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user_management.manage_user')->with('success', 'User deleted successfully.');
    }
    public function manage()
    {
        $users = User::all();
        return view('masters.user_management.manage_user', compact('users'));
    }

    public function edit_user($id)
    {
        $user = User::find($id);
        return view('masters.user_management.edit_user', compact('user'));
    }

    public function update_user(Request $request, $id)
    {

        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);


        $user = User::findOrFail($id);

        if (!empty($validatedData['password'])) {
            $validatedData['password'] = bcrypt($validatedData['password']);
        } else {

            unset($validatedData['password']);
        }

        $user->update($validatedData);
        return redirect()->route('user_management.manage_user')->with('success', 'User updated successfully.');
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

        $user = User::findOrFail($id);

        $user->password = bcrypt($validatedData['new_password']);
        $user->save();

        return response()->json(['success' => true, 'message' => 'Password updated successfully.']);
    }

    public function permission($id)
    {
        $menus = Menus::select('name')->distinct()->get();
        $username = User::where('id', $id)->pluck('username')->first();
        $first_name = User::where('id', $id)->pluck('first_name')->first();
        $userMenus = DB::table('user_menus')
            ->where('user_id', $id)
            ->pluck('menu_id')
            ->toArray();

        return view('masters.user_management.user_permission', compact('id', 'username', 'first_name', 'userMenus'));
    }
    public function fetch_user_menus(Request $request)
    {
        $user_menus = DB::table('user_menus as um')
            ->leftJoin('users as u', 'u.id', '=', 'um.user_id')
            ->leftJoin('menus as m', 'm.id', '=', 'um.menu_id')
            ->where('um.user_id', '=', $request->user_id)
            ->select('m.name as menu_name', 'm.address as menu_address', 'um.*')
            ->get();

        return $user_menus;
    }

    public function updateMenus(Request $request, $id)
    {
        foreach ($request->user_menus as $um) {
            DB::table('user_menus')->updateOrInsert(
                [
                    'user_id' => $request->user_id,
                    'menu_id' => $um['menu_id'],
                ],
                [
                    'is_alloted' => $um['is_alloted'],
                    'all' => $um['all'],
                    'add' => $um['add'],
                    'delete' => $um['delete'],
                    'view' => $um['view'],
                    'edit' => $um['edit'],
                ]
            );
        }
        return response()->json(['success' => 'User permissions updated successfully'], 200);
    }
    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function deactivate($id)
    {
        $users = User::find($id);
        $users->deleted_at = Carbon::now();
        $users->save();
        return redirect()->back()->with('success', 'Service deactivated.');
    }

    public function active($id)
    {
        $users = User::find($id);
        $users->deleted_at = null;
        $users->save();
        return redirect()->back()->with('success', 'Service activated.');
    }
}
