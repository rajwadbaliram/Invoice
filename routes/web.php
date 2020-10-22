<?php

use Illuminate\Support\Facades\Route;
use App\User;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('product_list','ProductController@show')
			->name('product_list');
Route::get('show_product','CartController@showproduct')
			->name('product');
Route::get('remove/{product}','CartController@remove');


Route::get('add_to_cart/{product}','CartController@add_to_cart');

Route::get('test','CartController@demo');

Route::get('print_invoice','CartController@printinvoice');
