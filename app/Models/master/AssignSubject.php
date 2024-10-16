<?php

namespace App\Models\master;

use Illuminate\Database\Eloquent\Model;

class AssignSubject extends Model
{
 	protected $table = 'assign_subjects';
 	protected $guarded = [];

 	// public function assign_subject(){
  //   	return $this->belongsTo('App\Models\master\studentClass','class_id');
  //   }

    public function assign_class(){
    	return $this->belongsTo('App\Models\master\studentClass','std_class_id');
    }

    public function assign_batch(){
    	return $this->belongsTo('App\Models\master\studentBatch','batch_id');
    }

    public function assign_section(){
    	return $this->belongsTo('App\Models\master\studentSectionMast','section_id');
    }

    public function children()
    {
        return $this->belongsTo('App\Models\master\AssignSubject','id');
    }
}
