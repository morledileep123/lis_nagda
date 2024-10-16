<?php

namespace App\Models\setting;

use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    protected $table = 'pages';
    protected $guarded =[];

    public function pageImages(){
    	 return $this->hasMany('App\Models\setting\PagesImage', 'page_id','page_id');
    } 
}
