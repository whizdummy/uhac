<?php

namespace App\ApiModel\v1;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    public $primaryKey = 'int_session_id';

    protected $fillable = [
   		'int_account_id_fk',
   		'dat_last',
   		'str_phone_model',
   		'str_phone_platform',
   		'str_version',
   		'str_serial'
   	];
}
