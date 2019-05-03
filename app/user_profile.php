<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class user_profile extends Model
{
	use SoftDeletes;
	protected $dates = ['deleted_at'];
    protected $fillable = ["name","idnumber","position","department","address","email","contact","basic","birthdate"];
}
