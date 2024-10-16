<?php

namespace App\Models\student;

use Illuminate\Database\Eloquent\Model;

class StudentMastPrevReocrd extends Model
{
    protected $table = 'student_mast_prev_record';
    protected $guarded = [];

    public function student_detail(){
    	return $this->belongsTo('App\Models\student\studentsMast','s_id');
    }

}
