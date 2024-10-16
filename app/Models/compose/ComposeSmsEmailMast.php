<?php

namespace App\Models\compose;

use Illuminate\Database\Eloquent\Model;

class ComposeSmsEmailMast extends Model
{
 	protected $table = 'compose_sms_email_mast';
    protected $guarded = [];

    // public function get_user(){
    //     return $this->hasMany('App\User','id','receiver_id');
    // } 
    public function smshistory(){
        return $this->hasMany('App\Models\compose\ComposeSmsEmail','compose_sms_id','id');
    }    
}
