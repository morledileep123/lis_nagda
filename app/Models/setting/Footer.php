<?php

namespace App\Models\setting;

use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    protected $table = 'setting_footer';
    // public $timestamps = false;
    // public $incrementing = false;
    // protected $primaryKey = null;
    protected $guarded =[];

    public function footerImages(){
    	 return $this->hasMany('App\Models\setting\FooterImg', 'footer_id','footer_id');
    } 
}
