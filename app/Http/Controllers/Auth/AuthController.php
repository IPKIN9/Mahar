<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        Auth::logout();
        return view('Auth.Login');
    }

    public function check(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect(route('dashboard.index'));
        }

        return back()->withErrors([
            'status' => 'Data tidak ditemukan.',
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('login'));
    }
}
