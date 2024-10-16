<?php

namespace App\Models\compose;

use Illuminate\Database\Eloquent\Model;

class ComposeSmsEmail extends Model
{
    protected $table = 'compose_sms_email';
    protected $guarded = [];
 	public $timestamps = false ;
 	public $incrementing = false;
    protected $primaryKey = null;
    
    public function get_user(){
        return $this->belongsTo('App\User','receiver_id');
    }    

}
