<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $table = 'certificate';
    protected $guarded =[];

     public function studentInfo(){
    	 return $this->belongsTo('App\Models\student\studentsMast', 'stu_id');	 
    }
    public function settingData(){
    	 return $this->belongsTo('App\Models\setting\Settings', 'user_id');	 
    }
    public function gaudiantInfo(){
    	 return $this->hasMany('App\Models\student\studentsGuardiantMast', 's_id','stu_id');
    } 
}
