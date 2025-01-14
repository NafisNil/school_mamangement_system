<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use Auth;
class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function list(){
        $data['getRecord'] = Subject::getRecord();
        return view('backend.subject.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function add()
    {
        //
        return view('backend.subject.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        request()->validate([
            'name' => 'required'
        ]);
        $subject = Subject::create([
            'name' => trim($request->name),
            'status' => trim($request->status),
            'type' => trim($request->type),
            'created_by' => Auth::user()->id,
        
        ]);

        return redirect()->route('subject.add')->with('success', 'Subject created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        //
        $data['getRecord'] = Subject::getSingle($id);
        if (!empty( $data['getRecord'])) {
            # code...
            return view('backend.subject.edit', $data);
        } else {
            # code...
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        //
        request()->validate([
            'name' => 'required'
        ]);
        $subject = Subject::getSingle($id);
        $subject->name = $request->name;
        $subject->type = $request->type;
        $subject->status = $request->status;
        $subject->save();

        return redirect()->route('subject.list')->with('success', 'Subject updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete( $id)
    {
        //
        $subject = Subject::getSingle($id);
        $subject->is_deleted = 1;
        $subject->save();
        return redirect()->back()->with('success', 'Subject deleted successfully!');
    }
}
