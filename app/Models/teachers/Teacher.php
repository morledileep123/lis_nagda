<?php

namespace App\Models\teachers;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table = 'teachers';
    protected $guarded =[];

    public function teacher(){
    	return $this->belongsTo('App\User','id');
    }
}
