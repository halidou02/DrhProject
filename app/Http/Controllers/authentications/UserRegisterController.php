<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\RoleTypeUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;

class UserRegisterController extends Controller
{
    public function showRegistrationForm()
    {
      $pageConfigs = ['myLayout' => 'blank'];
        $roles = RoleTypeUser::all(); // Assuming you have a RoleTypeUser model
        return view('content.authentications.auth-register-basic', compact('roles'), ['pageConfigs' => $pageConfigs]);
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        return redirect()->route('home')->with('success', 'Registration successful!');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone_number' => ['required', 'string', 'max:20'],
            'position' => ['required', 'string', 'max:255'],
            'department' => ['required', 'string', 'max:255'],
            'role_name' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone_number' => $data['phone_number'],
            'position' => $data['position'],
            'department' => $data['department'],
            'role_name' => $data['role_name'],
            'password' => Hash::make($data['password']),
            'join_date' => now(),
            'status' => 'active',
        ]);
    }
}
