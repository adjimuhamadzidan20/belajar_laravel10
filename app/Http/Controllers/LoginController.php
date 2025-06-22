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

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
