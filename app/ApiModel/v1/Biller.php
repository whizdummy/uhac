<?php

namespace App\ApiModel\v1;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Biller extends Model
{
    public $primaryKey = 'int_bill_id';

    protected $fillable = [
   		'str_biller' 
   	];

   	protected $dates 	=	['deleted_at'];
   	use SoftDeletes;
}
