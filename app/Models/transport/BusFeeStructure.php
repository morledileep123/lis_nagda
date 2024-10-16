<?php

namespace App\Models\transport;

use Illuminate\Database\Eloquent\Model;

class BusFeeStructure extends Model
{
    protected $table = 'bus_fee_structure';
    protected $guarded =[];
    protected $primaryKey = 'bus_fee_id';
}
