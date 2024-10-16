<?php

namespace App\Models\studentclass;

use Illuminate\Database\Eloquent\Model;

class AssignSubjectIdToClass extends Model
{

    protected $table = 'assign_subject_id_to_classes';
	public $timestamps = false;
	protected $guarded = [] ;
 	protected $primaryKey = 'null';
 	public $incrementing =false;


 	public function assign_subject_assign(){
 		return $this->belongsToMany('App\Models\studentclass\AssignSubjectToClass','assign_subject_id_to_classes','assign_subject_to_classes_id','mendatory_subject_id');
 	}

    public function subject(){
    	return $this->belongsTo('App\Models\master\Subject','mendatory_subject_id');
    }
}
