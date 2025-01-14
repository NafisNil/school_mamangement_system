<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassSubject;
use App\Models\Grade;
use App\Models\Subject;
use Auth;

class ClassSubjectController extends Controller
{
    //
    public function list(Request $request){
        $data['getRecord'] = ClassSubject::getRecord();
        return view('backend.assign_subject.list', $data);
    }

    public function add(Request $request){
        $data['getGrade'] = Grade::getGrade();
        $data['getSubject'] = Subject::getSubject();
        return view('backend.assign_subject.add', $data);
    }

    public function store(Request $request){
        if (!empty($request->subject_id)) {
            # code...
            foreach ($request->subject_id as $key => $value) {
                # code...
                $existAlready = ClassSubject::existAlready($request->class_id, $value);
                if ($existAlready) {
                    # code...
                    return redirect()->back()->with('error', 'Subject already assign');
                }else{
                    $data = new ClassSubject;
                    $data->class_id = $request->class_id;
                    $data->subject_id = $value;
                    $data->status = $request->status;
                    $data->created_by = Auth::user()->id;
                    $data->save();
                }
            }

            return redirect()->route('assign_subject.list')->with('success', 'Subject assign successfully');
        }else{
            return redirect()->back()->with('error', 'Please select subject');
        }
    }

    public function edit($id){
        $data['getGrade'] = Grade::getGrade();
        $data['getSubject'] = Subject::getSubject();
        return view('backend.assign_subject.edit', $data);
    }

    public function delete($id){
        $data = ClassSubject::getSingle($id);
        $data->is_deleted = 1;
        $data->save();
        return redirect()->route('assign_subject.list')->with('success', 'Subject delete successfully');
    }
}
