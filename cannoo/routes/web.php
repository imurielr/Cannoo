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


Route::get('/', 'HomeController@index')->name('home.index');
Route::get('/home', 'HomeController@index')->name('home.index');
Route::get('/product/create', ['middleware' => 'auth', 'uses' => 'ProductController@create'])->name("product.create");
Route::post('/product/save', ['middleware' => 'auth', 'uses' => 'ProductController@save'])->name("product.save");
Route::get('/product/show', ['middleware' => 'auth', 'uses' => 'ProductController@show'])->name("product.show");
Route::get('/product/show/{id}', ['middleware' => 'auth', 'uses' => 'ProductController@showProduct'])->name("product.showProduct");
Route::post('/product/delete/{id}', ['middleware' => 'auth', 'uses' => 'ProductController@delete'])->name("product.delete");
Route::get('/product/updateDescription/{id}', ['middleware' => 'auth', 'uses' => 'ProductController@changeDescription'])->name("product.update");
Route::post('/product/update/{id}', ['middleware' => 'auth', 'uses' => 'ProductController@update'])->name("product.updateDescription");
Route::get('/certificate/show', ['middleware' => 'auth', 'uses' => 'CertificateController@show'])->name("certificate.show");
Route::get('/certificate/create', ['middleware' => 'auth', 'uses' => 'CertificateController@create'])->name("certificate.create");
Route::post('/certificate/save', ['middleware' => 'auth', 'uses' => 'CertificateController@save'])->name("certificate.save");
Route::get('/client', ['middleware' => 'auth', 'uses' => 'ClientController@index'])->name("client.index");
Route::get('/client/create', ['middleware' => 'auth', 'uses' => 'ClientController@create'])->name("client.create");
Route::post('/client/save', ['middleware' => 'auth', 'uses' => 'ClientController@save'])->name("client.save");
Route::get('/client/show', ['middleware' => 'auth', 'uses' => 'ClientController@showAll'])->name("client.show");
Route::get('/client/show/{id}', ['middleware' => 'auth', 'uses' => 'ClientController@showClient'])->name("client.showClient");
Route::post('/client/delete/{id}', ['middleware' => 'auth', 'uses' => 'ClientController@delete'])->name("client.delete");
Route::get('/animal/show', ['middleware' => 'auth', 'uses' => 'AnimalController@show'])->name("animal.show");
Route::get('/animal/create', ['middleware' => 'auth', 'uses' => 'AnimalController@create'])->name("animal.create");
Route::post('/animal/save', ['middleware' => 'auth', 'uses' => 'AnimalController@save'])->name("animal.save");
Route::get('/animal/show/{id}', ['middleware' => 'auth', 'uses' => 'AnimalController@pet'])->name("animal.pet");
Route::post('/animal/erase/{id}', ['middleware' => 'auth', 'uses' => 'AnimalController@erase'])->name("animal.erase");
Route::get('/order', ['middleware' => 'auth', 'uses' => 'OrderController@index'])->name("order.index");
Route::get('/order/create', ['middleware' => 'auth', 'uses' => 'OrderController@create'])->name("order.create");
Route::get('/animal/removeFromOrder/{id}', ['middleware' => 'auth', 'uses' => 'AnimalController@deleteFromSession'])->name("animal.desorder");
Route::get('/animal/addToOrder/{id}', ['middleware' => 'auth', 'uses' => 'AnimalController@addToSession'])->name("animal.order");
Route::get('/item/create/{id}', ['middleware' => 'auth', 'uses' => 'ItemController@create'])->name("item.create");
Route::get('/item/save/', ['middleware' => 'auth', 'uses' => 'ItemController@save'])->name("item.save");
Route::get('/item/delete/{id}', ['middleware' => 'auth', 'uses' => 'ItemController@delete'])->name("item.delete");
Route::post('/session/save', ['middleware' => 'auth', 'uses' => 'SessionController@save'])->name("session.save");
Route::post('/session/delete', ['middleware' => 'auth', 'uses' => 'SessionController@delete'])->name("session.delete");

Route::get('/flush', ['middleware' => 'auth', 'uses' => 'OrderController@flush'])->name("order.flush");

Auth::routes();
