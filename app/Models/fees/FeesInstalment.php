<?php

namespace App\Models\fees;

use Illuminate\Database\Eloquent\Model;

class FeesInstalment extends Model
{
    protected $table = 'fees_instalments';
   	public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = null;
    protected $guarded =[];

}
