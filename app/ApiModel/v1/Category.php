<?php

namespace App\ApiModel\v1;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    protected $primaryKey 			=	'int_category_id';
    protected $dates				=	['deleted_at'];
    protected $fillable 			=	[
    	'str_category'
    ];

    use SoftDeletes;
}
