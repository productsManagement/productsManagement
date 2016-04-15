<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\ProductModel;
use App\Models\Template_ProductModel;
use App\Models\CategoryModel;

use Response;
use Excel;

class ProductsController extends Controller
{

    public function updatePrice(Request $request)
    {
        $id = $request->input('id');
        $newPrice = $request->only('price');
        ProductModel::updateProduct($id, $newPrice);
        //return redirect()->route('products.index');
    }

    public function updateName(Request $request)
    {
        //return $request->all();
        $id = $request->input('id');
        $newName = $request->only('name');
        if (ProductModel::updateProduct($id, $newName)){
            return $newName['name'];
        }
        //return redirect()->route('products.index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$products = ProductModel::getProductList(['id', 'SKU', 'name', 'brand',
            'category_id', 'description', 'unitName', 'unitValue', 'buyPrice', 'images',
            'status' , 'tags', 'created_by',   'updated_by'
        ]);
        //echo $products->count();
        return Response::json($products);
        //return view('products.index', ['products' => $products]);
        */

        $grid = ProductModel::getGrid();
        $text = "<div id='change_name_area'> Here is message </div>";
        return view('products.index', compact('grid', 'text'));
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
        return $lastCategory;
    }

    public function storeDetails(Request $request)
    {
        $newProduct = $request->only([
            'SKU', 'name', 'brand', 'category_id', 'description', 'unitName', 'unitValue',
            'buyPrice', 'images', 'status', 'tags', 'created_by', 'updated_by'
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
        $products = ProductModel::getProductById($id);
        //return Response::json($products);
        return view('products.show', ['products'=>$products[0]]);
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
        $options = $request->except('_token');
        ProductModel::updateProduct($id, $options);
        return ProductsController::show($id);
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
