<?php

namespace App\Models\student;

use Illuminate\Database\Eloquent\Model;

class CertificateRequest extends Model
{
    protected $table = 'certificate_req';
    protected $guarded =[];

    public function studentInfo(){
    	 return $this->belongsTo('App\Models\student\studentsMast', 'stu_id','user_id');	 
    }
    public function settingData(){
    	 return $this->belongsTo('App\Models\setting\Settings', 'user_id');	 
    }
    public function gaudiantInfo(){
    	 return $this->hasMany('App\Models\student\studentsGuardiantMast', 's_id','stu_id');
    } 
     public function cerfificate(){
         return $this->belongsTo('App\Models\Certificate', 'cert_req_id','cert_req_id');
    } 
}
