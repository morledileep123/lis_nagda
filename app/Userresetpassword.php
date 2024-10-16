<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Userresetpassword extends Model
{
  protected $table = 'user_reset_password';
  public $timestamps = true;
  protected $guarded = [];
  protected $fillable = ['id','email','tokens','created_at'];
 
}