<?php

namespace App\ApiModel\v1;

use Illuminate\Database\Eloquent\Model;

class Biller extends Model
{
    public $primaryKey = 'int_bill_id';

    protected $fillable = [
   		'str_biller' 
   	];
}
