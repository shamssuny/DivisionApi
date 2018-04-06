<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    public function index()
    {
        $tokens = DB::table('oauth_access_tokens')->where('user_id',Auth::id())->pluck('id');
        return view('user.dashboard',compact('tokens'));
    }

    public function generateToken()
    {
        User::find(Auth::id())->createToken('User')->accessToken;
        return redirect('/dashboard')->with('token_success','Token Generated Successfully');
    }


    public function deleteToken($token)
    {
        DB::table('oauth_access_tokens')->where('id',$token)->delete();
        return redirect('/dashboard')->with('token_delete','Token Deleted!');
    }
}
