<?php

namespace App\Models\acl;

use Illuminate\Database\Eloquent\Model;
use Laratrust\Traits\LaratrustUserTrait;

class User extends LaratrustUserTrait
{
	
    protected $guarded =[];
    
}
