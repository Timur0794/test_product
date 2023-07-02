<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index');

Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin'], function (){
   Route::get('/','ProductController@index')->name('admin.product.index');
   Route::get('/create','ProductController@create')->name('admin.product.create');
   Route::post('/','ProductController@store')->name('admin.product.store');
   Route::get('/{product}/edit','ProductController@edit')->name('admin.product.edit');
   Route::patch('/{product}','ProductController@update')->name('admin.product.update');
   Route::delete('/{product}','ProductController@delete')->name('admin.product.delete');
});
