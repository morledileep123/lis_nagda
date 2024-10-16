<?php

namespace App\Models\fees;

use Illuminate\Database\Eloquent\Model;

class FeesHeadTrans extends Model
{
    protected $table = 'fees_head_trans';
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = null;
    protected $guarded =[];

    public function fees_head(){
    	return $this->belongsTo('App\Models\fees\FeesHeadMast','fees_head_id','fees_head_id')->select('fees_head_id','head_name','is_installable');
    }
}
