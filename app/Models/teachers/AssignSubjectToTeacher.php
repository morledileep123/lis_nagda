<?php

namespace App\Models\teachers;

use Illuminate\Database\Eloquent\Model;

class AssignSubjectToTeacher extends Model
{
    protected $table = 'assign_subject_to_teachers';
    protected $guarded =[];

     public function get_assign_subject(){

    	return $this->hasMany('App\Models\teachers\AssignSubIdToTeacher','assign_subject_teacher_id','id');
	}
}
