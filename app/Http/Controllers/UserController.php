<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\RoleTypeUser; // Assuming this is the model for the role type users
use App\Models\Departement; // Assuming this is the model for the department

class UserController extends Controller
{
    public function create()
    {
        $roles = RoleTypeUser::all();
        $departments = Departement::all();
        return view('content.users.user-add', compact('roles', 'departments'));
    }

    public function index()
    {
        $users = User::with(['role', 'departement'])->get();
        return view('content.users.user-list', compact('users'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone_number' => 'required|string|max:255',
            'role_name' => 'required|exists:role_type_users,role_type',
            'department' => 'required|exists:departments,IDDepartement',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);

        return redirect()->route('user.index')->with('success', 'User created successfully');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = RoleTypeUser::all();
        $departments = Department::all();
        return view('content.users.user-edit', compact('user', 'roles', 'departments'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'phone_number' => 'required|string|max:255',
            'role_name' => 'required|exists:role_type_users,role_type',
            'department' => 'required|exists:departments,IDDepartement',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        if (!empty($validatedData['password'])) {
            $validatedData['password'] = bcrypt($validatedData['password']);
        } else {
            unset($validatedData['password']);
        }

        User::where('id', $id)->update($validatedData);

        return redirect()->route('user.index')->with('success', 'User updated successfully');
    }

    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('user.index')->with('success', 'User deleted successfully');
    }
}
