<?php

namespace App\ApiModel\v1;

use Illuminate\Database\Eloquent\Model;

class BusinessDependency extends Model
{
    public $primaryKey = 'int_business_dependency_id';

    protected $fillable = [
   		'str_business_dependency_name',
   		'str_business_dependency_value' 
   	];
}
