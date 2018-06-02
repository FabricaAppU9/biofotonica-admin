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

Route::get('/', 'DashController@index');
Route::resource('/','DashController');

Route::get('/fonte','FonteController@index');
Route::resource('/fonte','FonteController');
Route::put('/fonte/{fonte}/disable', 'FonteController@disable')->name('fonte.disable');

Route::get('/equip','EquipController@index');
Route::resource('/equip','EquipController');
Route::put('/equip/{equip}/disable', 'EquipController@disable')->name('equip.disable');

Route::get('/doenca', 'DoencaController@index');
Route::resource('/doenca', 'DoencaController');
Route::put('/doenca/{doenca}/disable','DoencaController@disable')->name('doenca.disable');

Route::get('/trata', 'trataController@index');
Route::resource('/trata', 'trataController');
Route::put('/trata/{trata}/disable','trataController@disable')->name('trata.disable');

Route::get('/admin','GerenciaController@index')->name('admin');
Route::get('/admin/{user}/edit','GerenciaController@edit')->name('admin.edit');
Route::put('/admin/{user}','GerenciaController@update')->name('admin.update');
Route::post('/admin/create','GerenciaController@create')->name('admin.store');
Route::put('/admin/{user}/disable', 'GerenciaController@disable')->name('admin.disable');
Auth::routes();
