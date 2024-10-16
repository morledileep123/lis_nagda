<?php

namespace App\Models\acl;

use Illuminate\Database\Eloquent\Model;
use Laratrust\Models\LaratrustRole;

class Role extends LaratrustRole
{
    // protected $table = 'roles';
    protected $guarded =[];
}
