<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Termwind\Components\Dd;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);
        if (auth()->attempt($credentials)) {
            return redirect()->route('dashboard');
        }
        return redirect('/login');
    }

    public function register(Request $request)
    {
        $credentials = $this->validate($request, [
            'name' => 'required|min:4|max:20',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|max:20',
        ]);
        $credentials['password'] = bcrypt($credentials['password']);
        $credentials['role_id'] = 2;
        User::create($credentials);
        return redirect()->route('login');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
