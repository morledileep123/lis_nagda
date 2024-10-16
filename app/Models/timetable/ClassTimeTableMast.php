<?php

namespace App\Models\timetable;

use Illuminate\Database\Eloquent\Model;

class ClassTimeTableMast extends Model
{
     protected $table = 'class_time_table_mast';
     protected $primaryKey = "class_tt_id";
     protected $guarded =[];
     

    public function get_class(){
     return $this->belongsTo('App\Models\master\studentClass','std_class_id');
    } 
    public function get_section(){
     return $this->belongsTo('App\Models\master\studentSectionMast','section_id');
    }
    public function get_batch(){
     return $this->belongsTo('App\Models\master\studentBatch','batch_id');
    }
    public function get_class_teacher(){
     return $this->belongsTo('App\user','id');
    }
    public function classTimetable(){
     return $this->hasMany('App\Models\timetable\ClassTimeTable','class_tt_mst_id','class_tt_mast_id');
    }
     public function periodsTime(){
     return $this->hasMany('App\Models\timetable\ClassPeriodTime','class_tt_mst_id','class_tt_mast_id');
    }
     
    //  public function get_time_table(){
    //  return $this->hasMany('App\Models\timetable\ExamTimeTable','time_id');
    // } 
    // public function get_from_class(){
    //  return $this->belongsTo('App\Models\master\studentClass','class_from');
    // }
    // public function get_to_class(){
    //  return $this->belongsTo('App\Models\master\studentClass','class_to');
    // }
    
}
