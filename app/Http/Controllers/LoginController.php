<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Auth;



class LoginController extends Controller
{
    function index () {
        return view('partials.login');
    }

    public function auth (Request $request) {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)) {
            
            $request->session()->regenerate();

            if ( Auth::user()->role_id == 1 ) {
                return redirect()->intended('/student')->with('loginSuccess', 'Login Success');
            } 

            if ( Auth::user()->role_id == 2 ) {
                return redirect()->intended('/teacher');
            }
        }

        return back()->with('LoginError', 'Error');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('logout', 'logout');
    }
}
