<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
class AdminController extends Controller
{
    //
    public function list(){
        $data['getRecord'] = User::getAdmin();
        return view('backend.admin.list', $data);
    }

    public function add(){
        
        return view('backend.admin.add');
    }

    public function store(Request $request){
   //     dd(Hash::make($request->password));
        request()->validate([
            'email' => 'required|email|unique:users'
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'user_type' => 1
        ]);

        return redirect()->route('admin.add')->with('success', 'Admin created successfully!');
    }

    public function edit($id){
        $data['getRecord'] = User::getSingle($id);
        if (!empty( $data['getRecord'])) {
            # code...
            return view('backend.admin.edit', $data);
        } else {
            # code...
            abort(404);
        }
    }

    public function update(Request $request, $id){
        request()->validate([
            'email' => 'required|email|unique:users,email,'. $id
        ]);
        $user= User::getSingle($id);
        if (!empty($request->password)) {
            # code...
            $password = bcrypt($request->password);
        }else{
            $password = $user->password;
        }
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $password,
           
        ]);

        return redirect()->route('admin.list')->with('success', 'Admin updated successfully!');
    }

    public function delete($id){
        $user= User::getSingle($id);
      
        $user->update([
            'is_deleted' => 1
        ]);
        return redirect()->route('admin.list')->with('success', 'Admin deleted successfully!');
    }
}
