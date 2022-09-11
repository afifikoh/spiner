<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::user()) {
            // if ($user->level == "administrator") {
            //     return redirect()->intended("beranda");
            // } elseif ($user->level == "pegawai") {
            //     return redirect()->intended("pegawai");
            // }

            // redirect ke layoutcontroller
            return redirect()->intended("home");
        }
        return view("login.v_login");
    }

    public function proses(Request $request)
    {
        $request->validate(
            [
                "email" => "required",
                "password" => "required",
            ],
            [
                "email.required" => "Email tidak boleh kosong",
                "password.required" => "Password tidak boleh kosong",
            ]
        );

        // kredensial = memastikan email dan password benar
        $kredensial = $request->only("email", "password");

        if (Auth::attempt($kredensial)) {
            $request->session()->regenerate();
            $user = Auth::user();
            // if ($user->level == "administrator") {
            //     return redirect()->intended("beranda");
            // } elseif ($user->level == "pegawai") {
            //     return redirect()->intended("pegawai");
            // }

            if ($user) {
                return redirect()->intended("home");
            }

            return redirect()->intended("/");
        }

        return back()
            ->withErrors([
                "email" => "Maaf email atau password anda salah",
            ])
            ->onlyInput("email");
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect("/login");
    }
}