<?php

namespace App\Models\fees;

use Illuminate\Database\Eloquent\Model;

class FineType extends Model
{
    protected $table = 'fine_types';
    protected $guarded =[];
 	protected $primaryKey = 'fine_type_id';
    public $timestamps = false;
}
