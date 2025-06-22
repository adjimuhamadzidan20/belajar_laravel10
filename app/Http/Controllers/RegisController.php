<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisController extends Controller
{
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
}
