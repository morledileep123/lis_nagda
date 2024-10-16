<?php

namespace App\Models\fees;

use Illuminate\Database\Eloquent\Model;

class StudentFeeReceiptHead extends Model
{
    protected $table = 'student_fees_receipt_heads';
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = null;
    protected $guarded =[];

    public function fee_head(){
    	return $this->belongsTo('App\Models\fees\StudentFeeHead','std_fee_head_id');
    }
}
