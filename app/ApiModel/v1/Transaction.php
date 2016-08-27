<?php

namespace App\ApiModel\v1;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public $primaryKey = 'int_transaction_id';

    protected $fillable = [
   		'int_bank_account_id_fk',
   		'int_bill_id_fk',
   		'int_transaction_type',
   		'int_transfer_account_id_fk',
   		'str_confirmation_no',
   		'str_source_currency',
   		'str_transfer_currency' 
   	];
}
