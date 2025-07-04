<?php

namespace App\Http\Controllers;

use App\Mail\ResetPasswordMail;
use App\Models\PasswordResetToken;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    // login
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

    // logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    // lupa password
    public function forgot_password()
    {
        return view('auth.forgot');
    }
    public function forgot_proses(Request $request)
    {
        $customMessage = [
            'email.required' => 'Email tidak boleh kosong!',
            'email.email' => 'Email tidak valid!',
            'email.exists' => 'Email tidak terdaftar dalam database!'
        ];

        // validasi inputan
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ], $customMessage);

        $token = Str::random(60);
        PasswordResetToken::updateOrCreate(
            [
                'email' => $request->email
            ],
            [
                'email' => $request->email,
                'token' => $token,
                'created_at' => now()
            ]
        );
        Mail::to($request->email)->send(new ResetPasswordMail($token));
        return redirect()->route('forgot')->with('success', 'Email berhasil terkirim!');
    }
    public function forgot_validasi(Request $request, $token)
    {
        $getToken = PasswordResetToken::where('token', $token)->first();

        if (!$getToken) {
            return redirect()->route('login')->with('failed', 'Token tidak valid!');
        }

        return view('mail.validasi_token', compact('token'));
    }
    public function forgot_validasi_proses(Request $request)
    {
        $customMessage = [
            'password.required' => 'Password tidak boleh kosong',
            'password.min'      => 'Password minimal 6 karakter',
        ];

        $request->validate([
            'password' => 'required|min:6'
        ], $customMessage);

        // mengambik data token
        $token = PasswordResetToken::where('token', $request->token)->first();

        if (!$token) {
            return redirect()->route('login')->with('failed', 'Token tidak valid!');
        }

        $user = User::where('email', $token->email)->first();
        if (!$user) {
            return redirect()->route('login')->with('failed', 'Email tidak terdaftar di database!');
        } else {
            $user->update([
                'password' => Hash::make($request->password)
            ]);
        }

        $token->delete();
        return redirect()->route('login')->with('success', 'Password berhasil terubah!');
    }
}
