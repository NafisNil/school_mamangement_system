<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    //
    protected $fillable = ['name', 'created_by', 'status'];

    static public function getClass(){
        return self::select('grades.*', 'users.name as created_by_name')
        ->join('users', 'users.id', 'grades.created_by')
        ->where('grades.is_deleted', 0)
        ->orderBy('grades.id', 'desc')
        ->paginate(20);
    }

    static public function getGrade(){
        return self::select('grades.*')
        ->join('users', 'users.id', 'grades.created_by')
        ->where('grades.is_deleted', 0)
        ->where('grades.status', 1)
        ->orderBy('grades.name', 'asc')
        ->get();
    }



    static public function getSingle($id){
        return self::find($id);
    }
}
