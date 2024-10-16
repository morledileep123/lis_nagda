<?php

namespace App\Models\master;

use Illuminate\Database\Eloquent\Model;

class ReportCardHeader extends Model
{
    protected $table ='report_card_headers';
    protected $guarded = [];
    
    public function report_card_headre(){
        return $this->hasMany('App\Models\master\ReportCardTitle','headers_id');
    }
    // public function report_card_headre(){
    //     return $this->hasMany('App\Models\master\ReportCardTitle','headers_titles_id','id');
    // } 
    public function subjects_name(){
        return $this->hasMany('App\Models\master\Subject','id');
    }

}
