<?php

namespace App\Models\timetable;

use Illuminate\Database\Eloquent\Model;

class ClassTimeTable extends Model
{
    protected $table = 'class_time_table';
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = null;
    protected $guarded =[];
    
    public function get_subject(){
        return $this->belongsTo('App\Models\master\Subject','subject_id');
    }
     public function get_teacher(){
        return $this->belongsTo('App\User','teacher_id');
    }

    
}
