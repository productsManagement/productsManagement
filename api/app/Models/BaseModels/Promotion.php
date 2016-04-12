<?php

namespace App\Models\BaseModels;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    
    protected $table = 'db_promotions';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
		'product_id',
		'name',
		'value',
		'start_at',
		'finish_at',
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
