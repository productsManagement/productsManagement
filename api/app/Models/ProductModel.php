<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\BaseModels\Product;
use Illuminate\Database\Query\Builder as QueryBuilder;


use Excel;

use Grids;
use HTML;
use Illuminate\Support\Facades\Config;
use Nayjest\Grids\Components\Base\RenderableRegistry;
use Nayjest\Grids\Components\ColumnHeadersRow;
use Nayjest\Grids\Components\ColumnsHider;
use Nayjest\Grids\Components\CsvExport;
use Nayjest\Grids\Components\ExcelExport;
use Nayjest\Grids\Components\Filters\DateRangePicker;
use Nayjest\Grids\Components\FiltersRow;
use Nayjest\Grids\Components\HtmlTag;
use Nayjest\Grids\Components\Laravel5\Pager;
use Nayjest\Grids\Components\OneCellRow;
use Nayjest\Grids\Components\RecordsPerPage;
use Nayjest\Grids\Components\RenderFunc;
use Nayjest\Grids\Components\ShowingRecords;
use Nayjest\Grids\Components\TFoot;
use Nayjest\Grids\Components\THead;
use Nayjest\Grids\Components\TotalsRow;
use Nayjest\Grids\DbalDataProvider;
use Nayjest\Grids\EloquentDataProvider;
use Nayjest\Grids\FieldConfig;

use Nayjest\Grids\IdFieldConfig;
use Nayjest\Grids\FilterConfig;
use Nayjest\Grids\Grid;
use Nayjest\Grids\GridConfig;

class ProductModel extends Product
{
    public static function getProductList($columns = ['*']){
    	return ProductModel::all($columns);
    }

    public static function getProductById($id, $columns = ['*']){
    	//return ProductModel::find($id)->get($columns);
        return ProductModel::where('id', $id)->get($columns);
    }

    public static function getProductBySKU($sku, $columns = ['*']){
    	$product = ProductModel::select($columns)->where('SKU', '=', $sku)->get();
    	return $product;
    }

    public static function createNewProduct($product){
    	return ProductModel::create($product);
    }    

    public static function updateProduct($id, $options){
    	$product = ProductModel::where('id', $id);
    	return $product->update($options);
    }

    public static function destroyProduct($id){
    	return ProductModel::destroy($id);
    }

    public static function getGrid(){
        
        $grid = new Grid(
            (new GridConfig)
                ->setDataProvider(
                    new EloquentDataProvider(Product::query())
                )
                ->setName('product_list')
                ->setPageSize(25)        
                # Setup caching, value in minutes, turned off in debug mode
                ->setCachingTime(0.1)
                ->setColumns([            
                    new IdFieldConfig,
                    (new FieldConfig)
                        ->setName('id')
                        ->setLabel('ID')
                        ->setCallback(function($val){
                            $input = "<input type='hidden' name='product_id' value=$val>";
                            return HTML::linkRoute("products.show", "Views", $val).$input;
                        })
                        ->setSortable(true)
                        ->setSorting(Grid::SORT_ASC)
                    ,
                    (new FieldConfig)
                        ->setName('name')
                        ->setLabel('Name')
                        ->setSortable(true)
                        ->setCallback(function($val){
                            $icon = '<span class="glyphicon glyphicon-edit"></span>';
                            
                            return '<div class="product_name"><p class="value">'.
                                    $val.
                                    '</p><button type="button" class="popover-class">'.
                                    $icon.'</button></div>';
                        })
                        ->addFilter(
                            (new FilterConfig)
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )
                    ,
                    (new FieldConfig)
                        ->setName('brand')
                        ->setLabel('Brand')
                        ->setSortable(true)
                        ->setCallback(function ($val) {
                            $icon = '<span class="glyphicon glyphicon-user"></span>&nbsp;';
                            return
                                '<small>'
                                . $icon
                                . HTML::link("provider/$val", $val)
                                . '</small>';
                        })
                        ->addFilter(
                            (new FilterConfig)
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )
                    ,
                    (new FieldConfig)
                        ->setName('description')
                        ->setLabel('Description')
                        ->setCallback(function($val){
                            return substr($val, 0, 50);
                        })
                        ->setSortable(true)
                        ->addFilter(
                            (new FilterConfig)
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )
                    ,
                    (new FieldConfig)
                        ->setName('buyPrice')
                        ->setLabel('Price')
                        ->setSortable(true)
                    ,
                    (new FieldConfig)
                        ->setName('status')
                        ->setLabel('Status')
                        ->setCallback(function($val){
                            return $val;
                        })
                        ->setSortable(true)
                        ->addFilter(
                            (new FilterConfig)
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )
                    ,
                    (new FieldConfig)
                        ->setName('created_at')
                        ->setLabel('Created At')
                        ->setSortable(true)
                    ,
                ])
                ->setComponents([
                    (new THead)
                        ->setComponents([
                            (new ColumnHeadersRow),
                            (new FiltersRow)
                                ->addComponents([
                                    (new RenderFunc(function () {
                                        return HTML::style('js/daterangepicker/daterangepicker-bs3.css')
                                        . HTML::script('js/moment/moment-with-locales.js')
                                        . HTML::script('js/daterangepicker/daterangepicker.js')
                                        . "<style>
                                                .daterangepicker td.available.active,
                                                .daterangepicker li.active,
                                                .daterangepicker li:hover {
                                                    color:black !important;
                                                    font-weight: bold;
                                                }
                                           </style>";
                                    }))
                                        ->setRenderSection('filters_row_column_birthday'),
                                    (new DateRangePicker)
                                        ->setName('created_at')
                                        ->setRenderSection('filters_row_column_birthday')
                                        ->setDefaultValue(['1990-01-01', date('Y-m-d')])
                                ])
                            ,
                            (new OneCellRow)
                                ->setRenderSection(RenderableRegistry::SECTION_END)
                                ->setComponents([
                                    new RecordsPerPage,
                                    new ColumnsHider,
                                    (new CsvExport)
                                        ->setFileName('my_report' . date('Y-m-d'))
                                    ,
                                    new ExcelExport(),
                                    (new HtmlTag)
                                        ->setContent('<span class="glyphicon glyphicon-refresh"></span> Filter')
                                        ->setTagName('button')
                                        ->setRenderSection(RenderableRegistry::SECTION_END)
                                        ->setAttributes([
                                            'class' => 'btn btn-success btn-sm'
                                        ])
                                ])
                        ])
                    ,
                    (new TFoot)
                        ->setComponents([
                            (new OneCellRow)
                                ->setComponents([
                                    new Pager,
                                    (new HtmlTag)
                                        ->setAttributes(['class' => 'pull-right'])
                                        ->addComponent(new ShowingRecords)
                                    ,
                                ])
                        ])
                    ,
                ])
        );
        $grid = $grid->render();
        return $grid;
    }

}
