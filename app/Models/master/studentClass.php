<?php

namespace App\Models\master;

use Illuminate\Database\Eloquent\Model;

class studentClass extends Model
{
    protected $table = 'student_classes';
    protected $guarded =[];

    public function assignsubject(){
    	return $this->hasMany('App\Models\studentclass\AssignSubjectToClass','std_class_id');
    } 
    public function subsubject(){
    	return  $this->hasMany('App\Models\master\studentClass','parent_id','id');
    }

}
