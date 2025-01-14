<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    //
    protected $fillable = [
        'name',
        'type',
        'status',
        'is_deleted',
        'created_by',
    ];

    static public function getRecord(){
        return self::select('subjects.*', 'users.name as created_by_name')
        ->join('users', 'users.id', 'subjects.created_by')
        ->where('subjects.is_deleted', 0)
        ->orderBy('subjects.id', 'desc')
        ->paginate(20);
    }


    static public function getSubject(){
        return self::select('subjects.*')
        ->join('users', 'users.id', 'subjects.created_by')
        ->where('subjects.is_deleted', 0)
        ->where('subjects.status', 1)
        ->orderBy('subjects.name', 'asc')
        ->get();
    }

    static public function getSingle($id){
        return self::find($id);
    }
}
