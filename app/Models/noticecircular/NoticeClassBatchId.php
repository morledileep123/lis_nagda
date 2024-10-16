<?php

namespace App\Models\noticecircular;

use Illuminate\Database\Eloquent\Model;

class NoticeClassBatchId extends Model
{
     protected $table = 'notice_class_batch_id';
    protected $guarded =[];

    public function get_student(){
  		return $this->belongsTo('App\Models\student\studentsMast','classes_id','std_class_id');
   	}
}
