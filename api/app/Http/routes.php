<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('partials.index');
});


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
/*
	prototype api
*/
Route::group([], function() {  //'middleware' => ''
	// api return list prototype
	Route::get('/prototypes', [
		'as' => 'prototypes.index',
		'uses' => 'PrototypesController@index'
		]);
	//create a prototype
	Route::get('/prototypes/create', [
		'as' => 'prototypes.create',
		'uses' => 'PrototypesController@create'
		]);

	Route::post('/prototypes/store', [
		'as' => 'prototypes.store',
		'uses' => 'PrototypesController@store'
		]);
});

/*
	product api
*/
Route::group([], function() {  //'middleware' => ''
	// api return list product
	Route::get('/products', [
		'as' => 'products.index',
		'uses' => 'ProductsController@index'
		]);

	Route::post('/products/change-name', [
		'as' => 'products.updateName',
		'uses' => 'ProductsController@updateName'
		]);


	Route::post('/products/change-price', [
		'as' => 'products.updatePrice',
		'uses' => 'ProductsController@updatePrice'
		]);

	// sample epxort
	Route::get('/products/export', [
		'as' => 'products.export',
		'uses' => 'ProductsController@export'
		]);

	Route::get('/products/example', [
		'as' => 'example.export',
		'uses' => 'ExampleController@exportUserList'
		]);

	// return product data have id
	Route::get('/products/{id}', [
		'as' => 'products.show',
		'uses' => 'ProductsController@show'
		]);

	Route::get('/products/{id}/update', [
		'as' => 'products.edit',
		'uses' => 'ProductsController@edit'
		]);

	Route::post('/products/{id}/update', [
		'as' => 'products.update',
		'uses' => 'ProductsController@update'
		]);

	Route::get('/products/create/classify', [
		'as' => 'products.createClassify',
		'uses' => 'ProductsController@createClassify'
		]);	

	Route::post('/products/create/classify', [
		'as' => 'products.storeClassify',
		'uses' => 'ProductsController@storeClassify'
		]);	

	Route::get('/products/create/details/{categoryId}', [
		'as' => 'products.createDetails',
		'uses' => 'ProductsController@createDetails'
		]);

	Route::post('/products/create/details', [
		'as' => 'products.storeDetails',
		'uses' => 'ProductsController@storeDetails'
		]);

	Route::get('/products/import', [
		'as' => 'products.import',
		'uses' => 'ProductsController@import'
		]);

	Route::post('/products/import/update', [
		'as' => 'products.importUpdate',
		'uses' => 'ProductsController@importUpdate'
		]);

	Route::post('/products/import/insert', [
		'as' => 'products.importInsert',
		'uses' => 'ProductsController@importInsert'
		]);
});

/*
	Categories API
*/

Route::group([], function() {  //'middleware' => ''
	// api return list category
	Route::get('/categories', [
		'as' => 'categories.index',
		'uses' => 'CategoriesController@index'
		]);

	Route::get('/categories/{id}/children', [
		'as' => 'categories.getchildren',
		'uses' => 'CategoriesController@getchildren'
		]);

	// sample epxort
	Route::get('/categories/export', [
		'as' => 'categories.export',
		'uses' => 'CategoriesController@export'
		]);

	// return category data have id
	Route::get('/categories/{id}', [
		'as' => 'categories.show',
		'uses' => 'CategoriesController@show'
		]);

	Route::get('/categories/{id}/update', [
		'as' => 'categories.edit',
		'uses' => 'CategoriesController@edit'
		]);

	Route::post('/categories/{id}/update', [
		'as' => 'categories.update',
		'uses' => 'CategoriesController@update'
		]);
});

/*
	Prototype API
*/

Route::group([], function() {  //'middleware' => ''
	// api return list category
	Route::get('/templates', [
		'as' => 'templates.index',
		'uses' => 'Template_ProductsController@index'
		]);

	// return category data have id
	Route::get('/templates/{id}', [
		'as' => 'templates.show',
		'uses' => 'Template_ProductsController@show'
		]);

	Route::get('/templates/create/{category_id}', [
		'as' => 'templates.create',
		'uses' => 'Template_ProductsController@create'
		]);

	Route::post('/templates/store', [
		'as' => 'templates.store',
		'uses' => 'Template_ProductsController@store'
		]);
});



/*
	export api
*/
	
Route::group([], function() {  //'middleware' => ''
	Route::post('/exports', [
		'as' => 'exports.index',
		'uses' => 'ExportsController@index'
		]);

	Route::get('/exports', [
		'as' => 'exports.index',
		'uses' => 'ExportsController@index'
		]);
});



//Example

Route::get('/demo/example1', 'DemoController@getExample1');
Route::get('/demo/example2', 'DemoController@getExample2');
Route::get('/demo/example3', 'DemoController@getExample3');
Route::get('/demo/example4', 'DemoController@getExample4');
Route::get('/demo/example5', 'DemoController@getExample5');
Route::get('/demo/example6', 'DemoController@getExample6');
Route::get('/demo/example7', 'DemoController@getExample7');