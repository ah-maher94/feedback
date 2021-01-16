<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{


    public function __construct(){
        $this->middleware(["guest"]);
    }

    public function login(){
        return view('auth.login');
    }

    public function loggedIn(Request $request){
        $this->validate($request,[
            "email"=>"required|email",
            "password"=>"required",
        ]);

        if(!auth()->attempt($request->only("email", "password"), $request->remember)){
            return back()->with("status", "Invalid Login Details");
        }

        return redirect()->route('home');
    }
}
