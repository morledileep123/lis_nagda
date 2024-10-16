<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use App\Models\student\studentsMast;

class StudentAttendance extends Model
{
    protected $table = 'student_attendances';
    protected $guarded =[];
    
    public function student(){
		return $this->belongsTo('App\Models\student\studentsMast','s_id');
	}
}
