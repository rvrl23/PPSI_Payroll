<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payroll extends Model
{

	use SoftDeletes;

	protected $dates = ['deleted_at'];
    protected $fillable = [ "renderedhours","overtime","holiday","basic","allowance",
     "late","undertime","absent","sss","hdmf","philhealth","holdingtax",
     "total","cut_off","idnumber"];
}
