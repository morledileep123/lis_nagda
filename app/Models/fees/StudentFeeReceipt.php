<?php

namespace App\Models\fees;

use Illuminate\Database\Eloquent\Model;

class StudentFeeReceipt extends Model
{
    protected $table = 'student_fees_receipt';
    protected $guarded =[];
    protected $primaryKey = 'receipt_bill_no';
    public $timestamps = false;
    public $incrementing = false;
    
    public function student(){
    	return $this->belongsTo('App\Models\student\studentsMast','s_id');
    }
    public function receipt_heads(){
    	return $this->hasMany('App\Models\fees\StudentFeeReceiptHead','receipt_bill_no');
    }
}
