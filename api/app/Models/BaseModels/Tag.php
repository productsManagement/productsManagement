<?php

namespace App\Models\BaseModels;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'db_tags';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
		'name',
		'created_by',
		'updated_by', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];
}
