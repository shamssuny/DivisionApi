<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login()
    {
        $this->validate(request(),[
            'email' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt(['email'=>request('email'),'password'=>request('password')])){
            return redirect('/dashboard');
        }else{
            return redirect('/login')->with('login_error','Login Details Not Matched!');
        }
    }


    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
