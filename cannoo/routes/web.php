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
Route::get('/product/create', 'ProductController@create')->name("product.create");
Route::post('/product/save', 'ProductController@save')->name("product.save");
Route::get('/product/show', 'ProductController@show')->name("product.show");
Route::get('/product/show/{id}', 'ProductController@showProduct')->name("product.showProduct");
Route::get('/product/delete/{id}', 'ProductController@delete')->name("product.delete");
Route::get('/product/updateDescription/{id}', 'ProductController@changeDescription')->name("product.update");
Route::post('/product/update/{id}', 'ProductController@update')->name("product.updateDescription");
Route::get('/certificate/show', 'CertificateController@show')->name("certificate.show");
Route::get('/certificate/create', 'CertificateController@create')->name("certificate.create");
Route::post('/certificate/save', 'CertificateController@save')->name("certificate.save");
Route::get('/client', 'ClientController@index')->name("client.index");
Route::get('/client/create', 'ClientController@create')->name("client.create");
Route::post('/client/save', 'ClientController@save')->name("client.save");
Route::get('/client/show', 'ClientController@showAll')->name("client.show");
Route::get('/client/show/{id}', 'ClientController@showClient')->name("client.showClient");
Route::get('/client/delete/{id}', 'ClientController@delete')->name("client.delete");
Route::get('/pets/show', 'PetsController@show')->name("pets.show");
Route::get('/pets/create', 'PetsController@create')->name("pets.create");
Route::post('/pets/save', 'PetsController@save')->name("pets.save");
Route::get('/pets/pet/{id}', 'PetsController@pet')->name("pets.pet");
Route::get('/pets/erase/{id}', 'PetsController@erase')->name("pets.erase");

Auth::routes();
