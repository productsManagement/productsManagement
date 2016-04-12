<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\BaseModels\Category;

class CategoryModel extends Category
{    
    public static function getCategoryByParentId($parent_id, $columns = ['*']){
    	return CategoryModel::where('parent_id', $parent_id)->get($columns);
    }

}
