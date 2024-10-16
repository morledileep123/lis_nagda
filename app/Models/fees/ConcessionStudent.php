<?php

namespace App\Models\fees;

use Illuminate\Database\Eloquent\Model;

class ConcessionStudent extends Model
{
    protected $table = 'concession_students';
    protected $guarded =[];
    protected $primaryKey = null;
    public $timestamps = false;
    public $incrementing = false;
     public function student_consession(){
        return $this->belongsTo('App\Models\student\studentsMast','s_id','id');
    }
}
