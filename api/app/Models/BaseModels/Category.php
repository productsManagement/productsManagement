<?php

namespace App\Models\BaseModels;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'db_categories';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
   		'name', 
        'parent_id', 
        'description', 
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
