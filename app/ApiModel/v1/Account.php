<?php

namespace App\ApiModel\v1;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    public $primaryKey = 'int_account_id';

    protected $fillable = [
    	'str_name',
    	'date_birthday',
    	'int_gender',
    	'int_civil_status',
    	'str_username',
    	'str_password'
   	];
}
