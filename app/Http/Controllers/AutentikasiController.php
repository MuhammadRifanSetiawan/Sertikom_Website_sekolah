<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AutentikasiController extends Controller
{
    public function tampilkanFormLogin()
    {
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }

        return view('auth.masuk');
    }

    public function prosesLogin(Request $request)
    {
        $kredensial = $request->validate([
            'email' => ['required', 'email'],
            'kata_sandi' => ['required', 'string'],
        ], [
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'kata_sandi.required' => 'Kata sandi wajib diisi.',
        ]);

        if (Auth::attempt(['email' => $kredensial['email'], 'password' => $kredensial['kata_sandi']], $request->boolean('ingat_saya'))) {
            $request->session()->regenerate();
            return redirect()->intended(route('admin.dashboard'))->with('sukses', 'Selamat datang kembali, ' . Auth::user()->nama);
        }

        return back()->withErrors([
            'email' => 'Email atau kata sandi yang Anda masukkan salah.',
        ])->onlyInput('email');
    }

    public function keluar(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('masuk')->with('sukses', 'Anda telah berhasil keluar dari sistem.');
    }
}
