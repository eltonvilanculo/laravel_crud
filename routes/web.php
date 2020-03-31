<?php

use Illuminate\Support\Facades\Route;

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
Route::resource('products','product\productController');
Route::any('/product/search','product\productController@search')->name('product.search');

Route::redirect('/','products');
//Route::get('/', 'product\productController@index');

// Route::get('login',function (){
//         return 'logado';
// })->name('a');
