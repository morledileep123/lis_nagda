<?php

namespace App\Models\fees;

use Illuminate\Database\Eloquent\Model;

class FeesHeadMast extends Model
{
    protected $table = 'fees_head_masts';
    protected $guarded =[];
    protected $primaryKey = 'fees_head_id';
    public function fine_type(){
  		return $this->hasMany('App\Models\fees\FineType','fine_type_id','fees_head_id');
   	} 
   	public function batch(){
  		return $this->belongsTo('App\Models\master\studentBatch','batch_id');
   	}
}
