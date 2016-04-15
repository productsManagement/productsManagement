<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\BaseModels\Category;

class CategoryModel extends Category
{    
    public static function getCategoryByParentId($parent_id, $columns = ['*']){
    	return CategoryModel::where('parent_id', $parent_id)->get($columns);
    }

    public static function getCategoryList($columns = ['*']){
    	return CategoryModel::all($columns);
    }

    public static function getCategoryById($id, $columns = ['*']){
    	//return ProductModel::find($id)->get($columns);
        return CategoryModel::where('id', $id)->get($columns);
    }

    public static function createNewProduct($product){
    	return CategoryModel::create($product);
    }    

    public static function updateCategory($id, $options){
    	$Category = CategoryModel::where('id', $id);
    	return $Category->update($options);
    }

    public static function destroyProduct($id){
    	return CategoryModel::destroy($id);
    }

}
