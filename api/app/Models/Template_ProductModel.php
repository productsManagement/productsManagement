<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\BaseModels\Template_Product;

use Illuminate\Database\Query\Builder as QueryBuilder;

class Template_ProductModel extends Template_Product
{
    public static function getTemplateByCategoryId($id, $columns = ['*']){
    	return Template_ProductModel::where('id', $id);
    }

    public static function getTemplates($columns = ['*']){
    	return Template_ProductModel::all($columns);
    }

    public static function getTemplateById($id, $columns = ['*']){
    	//return ProductModel::find($id)->get($columns);
        return Template_ProductModel::where('id', $id)->get($columns);
    }

    public static function createNewTemplate($Template){
    	return Template_ProductModel::create($Template);
    }    

    public static function updateTemplate($id, $options){
    	$template = Template_ProductModel::where('id', $id);
    	return $template->update($options);
    }

    public static function destroyTemplate($id){
    	return Template_ProductModel::destroy($id);
    }
}
