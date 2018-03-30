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

Route::get('/', function () {
  return  redirect('/home');
});




Route::get('/home','HomeController@index');
Route::get('/about','HomeController@showAbout');
Route::get('/product/{id}','ProductController@detail');
Route::get('/catalog','ProductController@showCatalog');

Route::get('/admin','HomeController@showAdmin');

Route::get('/products/list','ProductController@showList');
Route::get('/products/add','ProductController@showCreate');
Route::get('/products/edit','ProductController@showUpdate');
Route::get('/products/delete','ProductController@showDelete');
Route::post('/products/store','ProductController@store');


Route::get('/genres/list','GenreController@showList');
Route::get('/genres/add','GenreController@showCreate');
Route::get('/genres/edit','GenreController@showUpdate');
Route::get('/genres/delete','GenreController@showDelete');
Route::get('/genres/store','GenreController@store');


Route::get('/categories/list','CategoryController@showList');
Route::get('/categories/add','CategoryController@showCreate');
Route::get('/categories/edit','CategoryController@showUpdate');
Route::get('/categories/delete','CategoryController@showDelete');
Route::get('/categories/store','CategoryController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/shopping-cart','ShoppingCartController@getCart');
Route::get('/add-to-cart/{id}', 'ShoppingCartController@getAddToCart');
Route::get('/reduce/{id}', 'ShoppingCartController@getReduceByOne' );

