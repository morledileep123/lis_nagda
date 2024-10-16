<?php

namespace App\Models\hrms;

use Illuminate\Database\Eloquent\Model;

class EmpDocument extends Model
{
    protected $table = "emp_documents";
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = null;
    protected $guarded = [];
}
