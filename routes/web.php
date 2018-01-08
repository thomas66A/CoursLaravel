<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/',array(
    'as' => 'accueil',
    'uses' => 'controller@accueil'
));
Route::get('/cart',array(
    'as' => 'cart',
    'uses' => 'controller@cart'
));
Route::get('/checkout',array(
    'as' => 'checkout',
    'uses' => 'controller@checkout'
));
Route::get('/shop',array(
    'as' => 'shop',
    'uses' => 'controller@shop'
));
Route::get('/single-product',array(
    'as' => 'single-product',
    'uses' => 'controller@singleproduct'
));
/***   MODEL: Create Read Update Delete  ***/
Route::get('/crud', array(
    'as'=>'crud',
    'uses'=>('controller@crud')
));
Route::get('/crud', array(
    'as'=>'crud-category',
    'uses'=>('controller@crudCategory')
));
/*** QUERIES TO DATABASE ***/
Route::get('/queries', array(
    'as'=>"queries",
    'uses'=>'controller@queriesDatabase'
));
Route::get('/new-product', array(
    'as'=>'new-product',
    'uses'=>'Controller@newProduct'
));
Route::post('/new-product', array(
    'as'=>'new-product',
    'uses'=>'Controller@newProductService'
));
Route::get('/showproduct/{id?}', array(
    'as'=>'showProduct',
    'uses'=>'Controller@showProduct'
));

