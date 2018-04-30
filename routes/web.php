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

Route::get('/equip','EquipController@index');
Route::resource('/equip','EquipController');

Route::get('/doenca', 'DoencaController@index');
Route::resource('/doenca', 'DoencaController');

Route::get('/trata', 'trataController@index');
Route::resource('/trata', 'trataController');