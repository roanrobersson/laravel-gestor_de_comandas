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

Auth::routes();

// Home
Route::redirect('/', '/comanda')->name('home');

// Comanda
//Route::get('/comanda', 'ComandaController@index')->name('comanda_lista');

// Categoria
Route::get('/categoria', 'CategoriaController@index')->name('categoria_listar');
Route::get('/categoria/criar', 'CategoriaController@criar')->name('categoria_criar');
Route::post('/categoria', 'CategoriaController@salvar')->name('categoria_salvar');
Route::get('/categoria/{id}/editar', 'CategoriaController@editar')->name('categoria_editar');
Route::put('/categoria/{id}', 'CategoriaController@atualizar')->name('categoria_atualizar');
Route::delete('/categoria/{id}', 'CategoriaController@apagar')->name('categoria_apagar');

// Cardápio
Route::get('/cardapio', 'CardapioController@index')->name('cardapio_listar');
