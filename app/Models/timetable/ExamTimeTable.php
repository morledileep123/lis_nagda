<?php

namespace App\Models\timetable;

use Illuminate\Database\Eloquent\Model;

class ExamTimeTable extends Model
{
    protected $table = 'exam_time_table';
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = null;
    protected $guarded =[];

    public function get_subject(){
    	return $this->belongsTo('App\Models\master\Subject','subject_id');
    }
     public function get_class(){
    	return $this->belongsTo('App\Models\master\studentClass','class_id');
    }
}
