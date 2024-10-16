<?php

namespace App\Models\student;

use Illuminate\Database\Eloquent\Model;

class StudentSiblings extends Model
{
    protected $table = 'student_siblings';
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = null;
    protected $guarded =[];

    public function sibling_detail(){
    	return $this->belongsTo('App\Models\student\studentsMast','sibling_admission_no','admision_no')->select('id','admision_no','f_name','m_name','l_name','dob','gender','age','std_class_id','batch_id','status');
    }
}
