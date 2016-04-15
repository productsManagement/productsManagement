<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\BaseModels\Prototype;

use Illuminate\Database\Query\Builder as QueryBuilder;


class PrototypeModel extends Prototype
{    
    public static function getPrototypes($columns = ['*']){
    	return PrototypeModel::all($columns);
    }

    public static function getPrototypeById($id, $columns = ['*']){
    	//return ProductModel::find($id)->get($columns);
        return PrototypeModel::where('id', $id)->get($columns);
    }

    public static function getPrototypeByCategoryId($category_id, $columns = ['*']){
        //return ProductModel::find($id)->get($columns);
        return PrototypeModel::where('category_id', $category_id)->get($columns);
    }

    public static function createNewPrototype($prototype){
    	return PrototypeModel::create($prototype);
    }    

    public static function updatePrototype($id, $options){
    	$prototype = ProductModel::where('id', $id);
    	return $prototype->update($options);
    }

    public static function destroyPrototype($id){
    	return PrototypeModel::destroy($id);
    }

}
