<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','student_id','username','parent_id','user_flag','mobile_no',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function usersDetails(){
        return $this->belongsTo('App\User','id');
    }
     public function usersId(){
        return $this->hasMany('App\Models\team\TeachersTeam','id','users_id');
    }
     public function attendances(){
        return $this->hasMany('App\Models\TeacherAttendance','staff_id');
    }
    public function city(){
        return $this->belongsTo('App\Models\master\cityMast','city_id');
    }
    public function state(){
        return $this->belongsTo('App\Models\master\stateMast','state_id');
    }
    public function country(){
        return $this->belongsTo('App\Models\master\countryMast','country_id');
    }
    public function get_compose_sms(){
        return $this->hasMany('App\Models\composeEmail\ComposeSms','reciver_id','id');
    }

    public function student_mast(){
        return $this->belongsTo('App\Models\student\studentsMast','student_id','id');
    }
}
