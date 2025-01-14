<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grade;
use Auth;
class GradeController extends Controller
{
    //
    public function list(){
        $data['getRecord'] = Grade::getClass();
        return view('backend.grade.list', $data);
    }

    public function add(){
        return view('backend.grade.add');
    }


    public function store(Request $request){
        //     dd(Hash::make($request->password));
             request()->validate([
                 'name' => 'required'
             ]);
             $grade = Grade::create([
                 'name' => $request->name,
                 'status' => $request->status,
                 'created_by' => Auth::user()->id,
             
             ]);
     
             return redirect()->route('class.add')->with('success', 'Class created successfully!');
         }


         public function edit($id){
            $data['getRecord'] = Grade::getSingle($id);
            if (!empty( $data['getRecord'])) {
                # code...
                return view('backend.grade.edit', $data);
            } else {
                # code...
                abort(404);
            }
        }

        public function update(Request $request, $id){
            // dd($request->all());
            request()->validate([
                'name' => 'required'
            ]);
            $grade = Grade::getSingle($id);
            $grade->name = $request->name;
            $grade->status = $request->status;
            $grade->save();
    
            return redirect()->route('class.list')->with('success', 'Class updated successfully!');
        }

        public function delete($id){
            $grade = Grade::getSingle($id);
            $grade->is_deleted = 1;
            $grade->save();
    
            return redirect()->back()->with('success', 'Class deleted successfully!');
        }
    
}
