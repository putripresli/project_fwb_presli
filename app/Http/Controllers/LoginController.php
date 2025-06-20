<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function tampil_login()
    {
        return view('Auth.login');
    }
    public function login(Request $request)
    {
        $request->validate([
        'email' => 'required|email',
        'password' => 'required|string',
        ]);
        
        $log = $request->only('email', 'password');
        
        if (Auth::attempt($log, $request->filled('ingat'))) {
            $request->session()->regenerate();
            if (Auth::user()->role === 'admin') {

                return redirect('/admin');
            }
            elseif (Auth::user()->role === 'admin') {
                
                return redirect()->route('admin');
            }
            else {
                return redirect()->route('admin');
            }

        }

        return back()->withErrors([
            'email' => 'Email atau kata sandi salah.',
        ])->onlyInput('email');

    }
    
}
