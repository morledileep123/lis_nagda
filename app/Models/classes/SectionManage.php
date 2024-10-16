<?php

namespace App\Models\classes;

use Illuminate\Database\Eloquent\Model;

class SectionManage extends Model
{
    protected $table = 'section_manages';
    protected $guarded =[];

    public function section_names(){
       return $this->belongsTo('App\Models\master\studentSectionMast','section_id');
    } 
    public function batch_name(){
       return $this->belongsTo('App\Models\master\studentBatch','batch_id')->orderBy('batch_name','desc');
    }
    public function class_name(){
       return $this->belongsTo('App\Models\master\studentClass','class_id');
    } 
    // public function emp_mast(){
    //    return $this->belongsTo('App\Models\student\studentsMast','id');
    // }
}
