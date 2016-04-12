<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;
use App\Models\ProductModel;
use App\Models\Template_ProductModel;
use App\Models\PrototypeModel;
use Response;
use Excel;

class PrototypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prototypes = PrototypeModel::getPrototypes();
        return view('prototypes.index', ['prototypes' => $prototypes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('prototypes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $prototype = $request->only([
            'name', 'type', 'required', 'description']); 
        $values = array();
        $value_length = $request->input('value_length');
        foreach (range(0, $value_length-1) as $i) {
            $values[] = $request->input("value$i");
        }

        $prototype['values'] = json_encode($values);
        PrototypeModel::createNewPrototype($prototype);
        return redirect()->route('prototypes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $prototype = PrototypeModel::getPrototypeById($id);
        return view('prototypes.show', ['prototype' => $prototype]);
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
        PrototypeModel::updatePrototype($id, $options);
        return show($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PrototypeModel::destroy($id);
    }
}
