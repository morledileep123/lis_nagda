<?php

namespace App\Models\hrms;

use Illuminate\Database\Eloquent\Model;

class EmployeeMast extends Model
{
    protected $table = "employee_mast";
    protected $guarded = [];

    public function emp_doc(){
    	 return $this->hasMany('App\Models\hrms\EmpDocument','emp_id','id');
    }
    public function emp_qaul(){
    	 return $this->hasMany('App\Models\hrms\EmpQualification','emp_id','id');
    }
    public function roles()
    {
        return $this->belongsToMany('App\Models\Role');
    }

    public function attendances(){
        return  $this->hasMany('App\Models\TeacherAttendance','staff_id');
    }
}
