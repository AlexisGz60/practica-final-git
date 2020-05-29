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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//*************Cambio de ministerios****************//
Route::get('changeMin/{min}', function ($min) {
	\Session::put('ministerio_id', $min);
	\Session::save();
	return redirect()->route('home');
})->middleware('can_change');

Route::group(['middleware' => 'is_administrador'], function()
{
	//**********Catalogo de los distintos tipos de ofrendas Crud**************//
	Route::get('indexTiposOfrendas', [
		'uses' => 'CatalogoController@indexTiposOfrendas',
		'as' => 'tiposOfrendas.index'
	]);

	Route::post('createTipos', [
		'uses' => 'CatalogoController@createTiposOfrendas',
		'as' => 'tipoOfrenda.create'
	]);

	Route::post('updateTipos', [
		'uses' => 'CatalogoController@updateTiposOfrendas',
		'as' => 'tipoOfrenda.update'
	]);

	Route::delete('delTipos/{id}', [
		'uses' => 'CatalogoController@destroyTiposOfrendas',
		'as' => 'destroy.tipo'
	]);

	//**********Catalogo de los distintos tipos de egresos**************//
	Route::get('indexTiposEgresos', [
		'uses' => 'CatalogoController@indexEgresos',
		'as' => 'tipoEgresos.index'
	]);

	Route::post('createTiposEgresos', [
		'uses' => 'CatalogoController@createEgresos',
		'as' => 'tipoEgresos.create'
	]);

	Route::post('updateTiposEgresos', [
		'uses' => 'CatalogoController@updateEgresos',
		'as' => 'tipoEgresos.update'
	]);

	Route::delete('delTiposEgresos/{id}', [
		'uses' => 'CatalogoController@destroyEgresos',
		'as' => 'destroy.tipoEgresos'
	]);

	//**********Catalogo de metas**************//
	Route::get('indexMetas', [
		'uses' => 'CatalogoController@indexMetas',
		'as' => 'metas.index'
	]);

	Route::post('createMetas', [
		'uses' => 'CatalogoController@createMetas',
		'as' => 'metas.create'
	]);

	Route::post('updateMetas', [
		'uses' => 'CatalogoController@updateMetas',
		'as' => 'metas.update'
	]);

	Route::delete('delMetas/{id}', [
		'uses' => 'CatalogoController@destroyMetas',
		'as' => 'destroy.meta'
	]);

});