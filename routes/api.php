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

Route::get('fonte_tratamento', 'FonteController@apiFontes');
Route::get('doenca_tratamento/{fonte}', 'DoencaController@apiDoencas');
Route::get('equipamento_tratamento/{fonte}/{doenca}', 'EquipController@apiEquip');
Route::post('gera_config', function(Request $request) {
    return 'deu certo';
});
