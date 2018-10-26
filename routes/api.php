<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['namespace' => 'Api', 'as' => 'api.'], function () {
    Route::patch('products/{product}/restore', 'ProductController@restore');
    Route::resource('products', 'ProductController', ['except' => ['create', 'edit']]);
    Route::resource('categories','CategoryController', ['except' => ['create', 'edit']]);
    //recurso filho
//    POST products/1/categories
//    PUT products/1/categories  ADICIONAR E REMOVER -> [1,3] [10 CATEGORIAS]
//    GET products/1/categories
//    DELETE products/1/categories
//    DELETE products/1/categories/10
    Route::resource('products.categories','ProductCategoryController', ['only' => ['index','store','destroy']]);
    Route::resource('products.photos','ProductPhotoController', ['except' => ['create', 'edit']]);
    Route::resource('inputs','ProductInputController', ['only' => ['index','store','show']]);
    Route::resource('outputs','ProductOutputController', ['only' => ['index','store','show']]);
    Route::resource('users','UserController', ['except' => ['create', 'edit']]);
    // GET products/{product}/categories
    //
});
