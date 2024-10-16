<?php

namespace App\Models\fees;

use Illuminate\Database\Eloquent\Model;

class StudentFeeInstalment extends Model
{
    protected $table = 'student_fee_instalment';
    protected $guarded =[];
    protected $primaryKey = 'std_fee_inst_id';

    public function students(){
    	return $this->belongsTo('App\Models\student\studentsMast','s_id');
    }

    public function fee_heads(){
    	return $this->hasMany('App\Models\fees\StudentFeeHead','std_fee_inst_id','std_fee_inst_id');
    }
}
