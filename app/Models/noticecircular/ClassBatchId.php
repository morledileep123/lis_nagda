<?php

namespace App\Models\noticecircular;

use Illuminate\Database\Eloquent\Model;

class ClassBatchId extends Model
{
    protected $table = 'notice_class_batch_id';
    protected $guarded =[];

    public function get_classes(){
  		return $this->belongsTo('App\Models\master\studentClass','classes_id','id');
   	} 
   	public function get_users(){
  		return $this->belongsTo('App\Models\students\studentsMast','classes_id','id');
   	}
}
