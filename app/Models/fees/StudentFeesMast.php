<?php

namespace App\Models\fees;

use Illuminate\Database\Eloquent\Model;

class StudentFeesMast extends Model
{
    protected $table = 'student_fees_mast';
    protected $guarded =[];
    protected $primaryKey = 'std_fees_mast_id';


    public function student(){
    	return $this->belongsTo('App\Models\student\studentsMast','s_id');
    }

    public function student_instalments(){
    	return $this->hasMany('App\Models\fees\StudentFeeInstalment','std_fees_mast_id','std_fees_mast_id');
    }

}
