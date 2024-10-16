<?php

namespace App\Models\noticecircular;

use Illuminate\Database\Eloquent\Model;

class NoticeFaculty extends Model
{
    protected $table = 'notice_faculties';
    protected $guarded =[];

    public function facultyInfo(){
    	 return $this->belongsTo('App\user', 'faculty_id','id');
    }
}
