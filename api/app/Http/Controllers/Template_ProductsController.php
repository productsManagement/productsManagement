<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;


use App\Http\Controllers\Controller;
use App\Models\Template_ProductModel;
use App\Models\PrototypeModel;
use Response;
use Excel;

class Template_ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $templates = Template_ProductModel::all();
        return view('template_products.index', ['templates' => $templates]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($category_id)
    {
        $prototypes = PrototypeModel::getPrototypeByCategoryId($category_id);
        return view('template_products.create', ['category_id'=>$category_id, 'prototypes'=>$prototypes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $prototypes = $request->except(['_token', 'category_id', 'required']);

        foreach($prototypes as $prototype){
            $template = array();
            $template['category_id'] = $request->input('category_id');
            $template['prototype_id'] = $prototype;
            Template_ProductModel::createNewTemplate($template);
        }
        return redirect()->route('templates.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $template = Template_ProductModel::where('id', $id);
        
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
