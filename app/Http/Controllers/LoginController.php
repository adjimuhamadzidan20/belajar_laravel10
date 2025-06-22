<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    public function proses_login(Request $request)
    {
        // validasi inputan
        $validasi = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required'
        ]);

        // jika validasi gagal
        if ($validasi->fails()) {
            return redirect('login')->withErrors($validasi)->withInput();
        }

        $data = [
            'name' => $request->username,
            'password' => $request->password
        ];

        if (Auth::attempt($data)) {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('login')->with('failed', 'Username atau email tidak valid!');
        }
    }

    public function register()
    {
        return view('auth.register');
    }
    public function proses_regis(Request $request)
    {
        // validasi inputan
        $request->validate([
            'username' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6'
        ]);

        $data = [
            'name' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ];

        User::create($data);
        return redirect()->route('login')->with('success', 'Register berhasil!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
