<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassSubject extends Model
{
    //
    protected $table = 'class_subject';
    protected $fillable = [
        'class_id',
        'subject_id',
        'created_by',
        'is_deleted',
        'status',
    ];
    
    static public function getRecord(){
        return self::select('class_subject.*', 'grades.name as class_name', 'subjects.name as subject_name', 'users.name as created_by_name', 'subjects.type as subject_type')
        ->join('grades', 'grades.id', 'class_subject.class_id')
        ->join('subjects', 'subjects.id', 'class_subject.subject_id')
        ->join('users', 'users.id', 'class_subject.created_by')
        ->where('class_subject.is_deleted', 0)
        ->orderBy('class_subject.id', 'desc')
        ->get();
    }

    static public function existAlready($class_id, $subject_id){
        return self::where('class_id', $class_id)->where('subject_id', $subject_id)->first();
    }

    static public function getSingle($id){
        return self::find($id);
    }


}

