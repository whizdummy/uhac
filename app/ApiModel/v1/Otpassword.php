<?php

namespace App\ApiModel\v1;

use Illuminate\Database\Eloquent\Model;

class Otpassword extends Model
{
    public $primaryKey = 'int_otpassword_id';

    protected $fillable = [
   		'int_session_id_fk',
   		'int_otp' 
   	];
}
