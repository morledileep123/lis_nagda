<?php

namespace App\Models\studentclass;

use Illuminate\Database\Eloquent\Model;

class AssignSubjectToClass extends Model
{
    protected $table = 'assign_subject_to_classes';
    protected $guarded =[];

    public function subject_assign(){
        return $this->belongsToMany('App\Models\studentclass\AssignSubjectToClass','assign_subject_id_to_classes','assign_subject_to_classes_id','mendatory_subject_id');
    }



    public function assign_subjectId(){

  		return $this->hasMany('App\Models\studentclass\AssignSubjectIdToClass','assign_subject_to_classes_id');
   	}
   	public function class(){
    	return $this->belongsTo('App\Models\master\studentClass','std_class_id');
    }

    public function batch(){
    	return $this->belongsTo('App\Models\master\studentBatch','batch_id');
    }

    public function section(){
    	return $this->belongsTo('App\Models\master\studentSectionMast','section_id');
    }

}
