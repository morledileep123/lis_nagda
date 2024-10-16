<?php

namespace App\Models\team;

use Illuminate\Database\Eloquent\Model;

class TeachersTeam extends Model
{
    protected $table = 'teachers_teams';
    protected $guarded =[];

    public function members(){
    	return $this->belongsTo('App\User','user_id');
    }
    public function class_name(){
    	return $this->belongsTo('App\Models\master\studentClass','class_id');
    }
    public function members_assign(){
        return $this->belongsToMany('App\Models\UserTeam', 'user_team','team_id','user_id');
    }
   
}
