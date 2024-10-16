<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NoticeCircular extends Model
{
    protected $table = 'notice_circulars';
    protected $guarded =[];

    public function get_circular_id(){
  		return $this->hasMany('App\Models\noticecircular\ClassBatchId','notice_circular_id');
   	}
}
