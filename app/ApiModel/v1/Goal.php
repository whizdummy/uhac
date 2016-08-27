<?php

namespace App\ApiModel\v1;

use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    public $primaryKey = 'int_goal_id';

    protected $fillable = [
    	'int_account_id_fk',
    	'int_category_id_fk',
    	'str_goal_name',
    	'txt_remarks',
    	'deci_value',
    	'date_due',
    	'date_achieved'
    ];
}
