<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    function index () {
        return view('auth.register');
    }

    function regist (Request $request) {

        // return $request;// return @dd($request);
        $ValidatedData = $request->validate([
            'fullname' => 'required|min:3|max:255',
            'email' => 'required|min:3|unique:users',
            'role_id' => 'required',
            'instance' => 'required|min:3|max:255',
            'password' => 'required|min:3|max:255',
        ]);

        $ValidatedData['password'] = bcrypt($ValidatedData['password']);

        User::Create($ValidatedData);

        return redirect('/login')->with('success', 'Registrasi Sukses');
    }
}
