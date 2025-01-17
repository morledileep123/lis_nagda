<?php

namespace App\Models\timetable;

use Illuminate\Database\Eloquent\Model;

class ClassPeriodTime extends Model
{
    protected $table = 'class_period_time';
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = null;
    protected $guarded =[];

    public function get_subject(){
        return $this->belongsTo('App\Models\master\Subject','subject_id');
    }
     public function get_teacher(){
        return $this->belongsTo('App\Models\teachers\Teacher','teacher_id');
    }
    
}
