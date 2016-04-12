<?php

namespace App\Models\BaseModels;

use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    protected $table = 'db_views';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
		'name',
		'data',
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
