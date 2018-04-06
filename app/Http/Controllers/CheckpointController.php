<?php

namespace App\Http\Controllers;

use App\Approve;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckpointController extends Controller
{
    public function index()
    {
        return view('user.checkpoint');
    }

    public function checkCode()
    {
        $this->validate(request(),[
            'code' => 'required|numeric'
        ]);

        if(User::find(Auth::id())->approves->code == request('code')){
            User::find(Auth::id())->approves->delete();
            return redirect('/dashboard');
        }else{
            return redirect()->back()->with('code_error','Code Does Not Match!');
        }
    }

    public function resend($id)
    {
        $getMail = User::find(Auth::id())->email;
        $getCode = User::find(Auth::id())->approves->code;
        mail($getMail,'Api Bd Approve Code','Your Approve Code is:'.$getCode);
    }
}
