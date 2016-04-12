<?php

namespace App\Models\BaseModels;

use Illuminate\Database\Eloquent\Model;

class Template_Product extends Model
{
    protected $table = 'db_template_products';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
		'category_id',
		'prototypes',
		'created_by',
		'updated_by'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];
}
