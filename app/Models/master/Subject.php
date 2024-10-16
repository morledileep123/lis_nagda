<?php

namespace App\Models\master;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table = 'subjects';
    protected $guarded =[];
    public function subsubjects(){
    	return  $this->hasMany('App\Models\master\Subject','parent_id','id')->where('subject_name','<>','GK');
    }
}
