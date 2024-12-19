<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('register.signup');
    }
    public function showLogin()
    {
        return view('register.login');
    }

    public function register(Request $r)
    {
        $r->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string',
        ]);

        try {
            User::create([
                'name' => $r['name'],
                'password' => Hash::make($r['password']),
                'email' => $r['email'],
            ]);
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
        return redirect()->route('login')->with('success', 'Register completed!');
    }

    public function login(Request $r)
    {
        $r->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $r['email'])->first();

        if ($user && Hash::check($r['password'], $user->password)) {
            Session::put('user_id', $user->id);
            Session::put('email', $user->email);

            return redirect()->route('flight.index')->with('success', 'Login success!');
        } else {
            return redirect()->back()->with('error', 'Invalid email or password!');
        }
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/login')->with('success', 'Logged out!');
    }
}
