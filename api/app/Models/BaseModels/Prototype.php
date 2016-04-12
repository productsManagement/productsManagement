<?php

namespace App\Models\BaseModels;

use Illuminate\Database\Eloquent\Model;

class Prototype extends Model
{
    protected $table = 'db_prototypes';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
		'name',
		'values',
        'type',
		'required',
        'description',
		'view_id',
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
