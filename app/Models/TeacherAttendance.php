<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeacherAttendance extends Model
{
    protected $table = 'teacher_attendances';
    protected $guarded =[];

    public function teacher(){
   		return $this->belongsTo('App\Models\hrms\EmployeeMast','staff_id');
   	}
}
