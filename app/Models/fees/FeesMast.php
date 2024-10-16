<?php

namespace App\Models\fees;

use Illuminate\Database\Eloquent\Model;

class FeesMast extends Model
{
    protected $table = 'fees_masts';
    protected $guarded =[];
    protected $primaryKey = 'fees_id';

    public function fees_heads(){
  		return $this->hasMany('App\Models\fees\FeesHeadTrans','fees_id','fees_id');	
    }
    public function batch(){
    	return $this->belongsTo('App\Models\master\studentBatch','batch_id');
    }
    public function fees_instalments(){
    	return  $this->hasMany('App\Models\fees\FeesInstalment','fees_id','fees_id');
    }
    public function class(){
    	return $this->belongsTo('App\Models\master\studentClass','std_class_id');
    }
    public function section(){
    	return $this->belongsTo('App\Models\master\studentSectionMast','section_id');
    }
}
