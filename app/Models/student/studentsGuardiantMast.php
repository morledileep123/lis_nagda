<?php

namespace App\Models\student;

use Illuminate\Database\Eloquent\Model;

class studentsGuardiantMast extends Model
{
    protected $table = 'students_guardiant_masts';
    protected $guarded =[];

    public function profession_type(){
    	 return $this->belongsTo('App\Models\master\professionType', 'profession_status','id');
    } 
  
    public function guardian_designation(){
         return $this->belongsTo('App\Models\master\guardianDesignation', 'designation');
         
    } 
    
}