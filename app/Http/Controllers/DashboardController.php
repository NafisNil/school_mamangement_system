<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class DashboardController extends Controller
{
    //
    public function dashboard(){
        if (Auth::user()->user_type == 1) {
            # code...
            return view('backend.admin.dashboard');
        }elseif(Auth::user()->user_type == 2) {
            # code...
            return view('backend.teacher.dashboard');
        }elseif(Auth::user()->user_type == 3) {
            # code...
            return view('backend.student.dashboard');
        }elseif(Auth::user()->user_type == 4) {
            # code...
            return view('backend.parent.dashboard');
        }
        
    }
}
