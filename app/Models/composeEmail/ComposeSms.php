<?php

namespace App\Models\composeEmail;

use Illuminate\Database\Eloquent\Model;

class ComposeSms extends Model
{
    protected $table = 'compose_sms';
    protected $guarded =[];

    public function get_user(){
        return $this->hasMany('App\User','id','reciver_id');
    }
    
}
