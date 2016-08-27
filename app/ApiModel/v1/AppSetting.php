<?php

namespace App\ApiModel\v1;

use Illuminate\Database\Eloquent\Model;

class AppSetting extends Model
{
    public $primaryKey = 'int_app_setting_id';

    protected $fillable = [
   		'int_account_id_fk',
   		'txt_setting_dir' 
   	];
}
