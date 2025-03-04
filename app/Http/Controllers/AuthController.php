<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        return view('auth/login');
    }

    public function loginProses(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required|min:4',
        ],[
            'username.required' => 'Username harus diisi',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 4 karakter'
        ]);

        $data = [
            'username' => $request->username,
            'password' => $request->password,
        ];
        
        if (Auth::attempt($data)) {
            return redirect()->route('dashboard')->with('success', 'Anda berhasil Login');
        } else {
            return redirect()->back()->with('error', 'Username / Password Salah');
        }
    }

    public function logout(){
        Auth::logout();

        return redirect()->route('login')->with('success', 'Anda berhasil Logout');
    }
}
