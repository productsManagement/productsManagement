<?php

namespace App\Models\BaseModels;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $table = 'db_units';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
		'name',
		'values',
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
