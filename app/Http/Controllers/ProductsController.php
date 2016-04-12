<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\ProductModel;
use App\Models\Template_ProductModel;
use App\Models\CategoryModel;

use App\Models\UserListExport;
use Response;
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
use Nayjest\Grids\FilterConfig;
use Nayjest\Grids\Grid;
use Nayjest\Grids\GridConfig;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = ProductModel::getProductList([
            'id', 
            'SKU',
            'name',
            'brand',
            'category_id',
            'description',
            'unitName',
            'unitValue',
            'buyPrice',
            'images',
            'status' ,
            'tags',
            'created_by',
            'updated_by'
        ]);

        //echo Response::json($products);
        //return view('products.index', ['products' => $products]);

        
        $grid = new Grid(
            (new GridConfig)
                ->setDataProvider(
                    new EloquentDataProvider(ProductModel::query())
                )
                ->setName('example_grid4')
                ->setPageSize(25)
                ->setColumns([
                    (new FieldConfig)
                        ->setName('id')
                        ->setLabel('ID')
                        ->setCallback(function($val){
                            return HTML::linkRoute("products.show", "Details", $val);
                        })
                        ->setSortable(true)
                        ->setSorting(Grid::SORT_ASC)
                    ,
                    (new FieldConfig)
                        ->setName('name')
                        ->setLabel('Name')
                        ->setSortable(true)
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
        return view('products.index', compact('grid'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createClassify()
    {
        $categories = CategoyModel::getCategoryByParentId(null);
        //return Response::jon($categories);
        return view('categories.index', ['categories' => $categories]);
    }

    public function createDetails($categoryId)
    {
        $template = Template_ProductModel::getTemplateByCategoryId($categoryId);
        //return Response::jon($template);
        $product = "text";
        return view('products.formExample', ['category_id' => $categoryId, 'product'=>$product]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeClassify(Request $request)
    {
        $lastCategory = $request->input('lastCategory');
        //return $lastCategory;
        return $lastCategory;
    }

    public function storeDetails(Request $request)
    {
        $newProduct = $request->only([
            'SKU',
            'name',
            'brand',
            'category_id',
            'description',
            'unitName',
            'unitValue',
            'buyPrice',
            'images',
            'status' ,
            'tags',
            'created_by',
            'updated_by'
        ]);
        
        ProductModel::create($newProduct);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = ProductModel::getProductById($id);
        //return Response::json($products);
        return view('products.show', ['products'=>$products[0]]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $options = $request->all();
        ProductModel::updateProduct($id, $options);
        return show($id);
    }

    public function export(){
        $products = ProductModel::select('SKU', 'name', 'brand', 'category_id')->get();
        Excel::create('products', function($excel) use($products) {
            $excel->sheet('Sheet 1', function($sheet) use($products) {
                $sheet->fromArray($products);
            });
        })->export('xls');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProductModel::destroy($id);
    }
}
