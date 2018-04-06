<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function register()
    {
        $this->validate(request(),[
           'name'=>'required|min:4',
           'email'=>'email|unique:users|required',
            'password'=>'required|confirmed|min:4'
        ]);

        $rand = rand(100000,999999);

        User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password'))
        ])
        ->approves()->create([
                'code' => $rand
            ]);

        mail(request('email'),'Api BD Code','Your Approve Code is:'.$rand);

        return redirect('/login')->with('create_success','Registration Success! Check Mail and Login to continue!');
    }
}
