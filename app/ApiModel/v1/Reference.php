<?php

namespace App\ApiModel\v1;

use Illuminate\Database\Eloquent\Model;

class Reference extends Model
{
    public $primaryKey = 'int_reference_id';

    public $timestamps = false;

    protected $fillable = [
   		'str_reference_no',
   		'int_transaction_id_fk' 
   	];
}
