<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Hash;
use App\Models\User;
use App\Mail\ForgetPasswordMail;
use Mail;
use Str;
class AuthController extends Controller
{
    
    public function login(){
        if (!empty(Auth::check())) {
            # code...
            if (Auth::user()->user_type == 1) {
                # code...
                return redirect()->intended('admin/dashboard');
            } elseif (Auth::user()->user_type == 2) {
                # code...
                return redirect()->intended('teacher/dashboard');
            } elseif (Auth::user()->user_type == 3) {
                # code...
                return redirect()->intended('student/dashboard');
            } elseif (Auth::user()->user_type == 4) {
                # code...
                return redirect()->intended('parent/dashboard');
            } 
        }
        return view('auth.login');
    }

    public function authLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
    
        $user = User::where('email', $credentials['email'])->first();
    
        if ($user && Hash::check($credentials['password'], $user->password)) {
            Auth::login($user, $request->remember);
            if (Auth::user()->user_type == 1) {
                # code...
                return redirect()->intended('admin/dashboard');
            } elseif (Auth::user()->user_type == 2) {
                # code...
                return redirect()->intended('teacher/dashboard');
            } elseif (Auth::user()->user_type == 3) {
                # code...
                return redirect()->intended('student/dashboard');
            } elseif (Auth::user()->user_type == 4) {
                # code...
                return redirect()->intended('parent/dashboard');
            } 
        }
    
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('index');
    }

    public function forgetPassword(){
        return view('auth.forget');
    }

    public function postForgetPassword(Request $request){
        $user = User::getEmailSingle($request->email);
        if (!empty($user)) {
            # code...
            $user->remember_token = Str::random(30);
            $user->save();
            Mail::to($user->email)->send(new ForgetPasswordMail($user));
            return redirect()->back()->with('success', 'Please check your mail!');
        }else{
             
        }
    }

    public function resetPassword($token){
        $user = User::getTokenSingle($token);
        if (!empty($user)) {
            # code...
            $data['user'] = $user;

            return view('auth.reset', $data);
        } else {
            # code...
            alert('404');
        }
        
    }

    public function postResetPassword($token, Request $request){
          
        if ($request->password == $request->cpassword) {
            # code...
            $user = User::getTokenSingle($token);
            $user->password = bcrypt($user->password);
          
            $user->remember_token = Str::random(30);
            $user->save();
            return redirect()->route('login')->with('success', 'Password reset successfully!');
        }else{
            return redirect()->back()->with('success', 'Password does not matched!');
        }
    }



}
