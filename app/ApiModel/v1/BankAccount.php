<?php

namespace App\ApiModel\v1;

use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    public $primaryKey = 'int_bank_account_id';

    protected $fillable = [
   		'int_account_id_fk',
   		'str_account_no' 
   	];
}
