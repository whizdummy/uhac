<?php

namespace App\ApiModel\v1;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BankAccount extends Model
{
	use SoftDeletes;

	protected $dates = [
		'deleted_at'
	];

    public $primaryKey = 'int_bank_account_id';

    protected $fillable = [
   		'int_account_id_fk',
   		'str_account_no' 
   	];
}
