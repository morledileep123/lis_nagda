<?php

namespace App\Models\fees;

use Illuminate\Database\Eloquent\Model;

class ConcessionMast extends Model
{

    protected $table = 'concession_masts';
    protected $guarded =[];
    protected $primaryKey = 'concession_id';

     public function concession_apply(){
    	return $this->hasMany('App\Models\fees\ConcessionStudent','concession_id','concession_id');
    }

}
