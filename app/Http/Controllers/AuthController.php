<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    
    public function login(){
        return view('auth.login');
    }

    public function authLogin(Request $request){
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], true)) {
            # code...

        }else {
            return redirect()->back()->with('error', 'Wrong credentials!');
        }
    }

}
