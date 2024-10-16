<?php

namespace App\Models\fees;

use Illuminate\Database\Eloquent\Model;

class ConcessionApplyTrans extends Model
{
	
    protected $table = 'concession_apply_trans';
    protected $guarded =[];
    protected $primaryKey = 'concession_apply_id';

    public function concession_students(){
    	return  $this->hasMany('App\Models\fees\ConcessionStudent','concession_apply_id','concession_apply_id');
    }

}
