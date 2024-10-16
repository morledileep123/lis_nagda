<?php

namespace App\Models\master;

use Illuminate\Database\Eloquent\Model;

class Discounts extends Model
{
    protected $table ='discount_mast';
    protected $guarded = [];
    
     public function disc_type(){
    	return $this->belongsTo('App\Models\master\DiscountTypes','discount_type_id','discount_type_id');
    }
    
}
