<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginview()
    {
        return view('login');
    }

    public function check()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        return redirect()->route('loginView');
    }
    public function login(Request $request)
    {
        if (!Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect()->route(
                'loginView'
            )->with('error', 'Username atau password salah');
        }

        $auth = Auth::user();

        return redirect()->route('dashboard', compact('auth'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('loginView');
    }
}
