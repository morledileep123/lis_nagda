<?php

namespace App\Models\timetable;

use Illuminate\Database\Eloquent\Model;

class ExamTimeTableMast extends Model
{
     protected $table = 'exam_time_table_mast';
     protected $primaryKey = "time_id";
     protected $guarded =[];

     
     public function get_time_table(){
    	return $this->hasMany('App\Models\timetable\ExamTimeTable','time_id');
    } 
    public function get_from_class(){
    	return $this->belongsTo('App\Models\master\studentClass','class_from');
    }
    public function get_to_class(){
    	return $this->belongsTo('App\Models\master\studentClass','class_to');
    }
    
}
