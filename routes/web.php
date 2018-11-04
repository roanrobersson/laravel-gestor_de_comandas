<?php
use PharIo\Manifest\InvalidApplicationNameException;
use Illuminate\Support\Facades\Auth;

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
Route::redirect('/home', '/comanda')->name('home');
Route::redirect('/', '/comanda');



  // Comanda
  Route::get('/comanda', 'ComandaController@index')->name('comanda_listar');
  Route::get('/comanda/{id}/ver', 'ComandaController@ver')->name('comanda_ver');
  Route::get('/comanda/criar', 'ComandaController@criar')->name('comanda_criar');
  Route::post('/comanda', 'ComandaController@salvar')->name('comanda_salvar');
  Route::get('/comanda/{id}/editar', 'ComandaController@editar')->name('comanda_editar');
  Route::put('/comanda/{id}', 'ComandaController@atualizar')->name('comanda_atualizar');
  Route::put('/comanda/{id}/pagamento', 'ComandaController@atualizarPagamento')->name('comanda_atualizar_pagamento');
  Route::delete('/comanda/{id}', 'ComandaController@apagar')->name('comanda_apagar');
  Route::delete('/comanda/{id}/{pivotId}', 'ComandaController@apagarItem')->name('comanda_apagar_item');
  Route::get('/comanda/{id}/pagar', 'ComandaController@pagar')->name('comanda_pagar');
  Route::get('/comanda/novoPedido', 'ComandaController@novoPedido')->name('comanda_novoPedido');
  Route::post('/comanda/pedido', 'ComandaController@salvarPedido')->name('comanda_salvarPedido');


Route::middleware(['admin'])->group(function () {

  // Categoria
  Route::get('/categoria', 'CategoriaController@index')->name('categoria_listar');
  Route::get('/categoria/criar', 'CategoriaController@criar')->name('categoria_criar');
  Route::post('/categoria', 'CategoriaController@salvar')->name('categoria_salvar');
  Route::get('/categoria/{id}/editar', 'CategoriaController@editar')->name('categoria_editar');
  Route::put('/categoria/{id}', 'CategoriaController@atualizar')->name('categoria_atualizar');
  Route::delete('/categoria/{id}', 'CategoriaController@apagar')->name('categoria_apagar');

  // Cardápio
  Route::get('/cardapio', 'CardapioController@index')->name('cardapio_listar');
  Route::get('/cardapio/criar', 'CardapioController@criar')->name('cardapio_criar');
  Route::post('/cardapio', 'CardapioController@salvar')->name('cardapio_salvar');
  Route::get('/cardapio/{id}/editar', 'CardapioController@editar')->name('cardapio_editar');
  Route::put('/cardapio/{id}', 'CardapioController@atualizar')->name('cardapio_atualizar');
  Route::delete('/cardapio/{id}', 'CardapioController@apagar')->name('cardapio_apagar');

  // Adicional
  Route::get('/adicional', 'AdicionalController@index')->name('adicional_listar');
  Route::get('/adicional/criar', 'AdicionalController@criar')->name('adicional_criar');
  Route::post('/adicional', 'AdicionalController@salvar')->name('adicional_salvar');
  Route::get('/adicional/{id}/editar', 'AdicionalController@editar')->name('adicional_editar');
  Route::put('/adicional/{id}', 'AdicionalController@atualizar')->name('adicional_atualizar');
  Route::delete('/adicional/{id}', 'AdicionalController@apagar')->name('adicional_apagar');

  //Usuario
  Route::get('/usuario', 'UsuarioController@index')->name('usuario_listar');
  Route::get('/usuario/criar', 'UsuarioController@criar')->name('usuario_criar');
  Route::post('/usuario', 'UsuarioController@salvar')->name('usuario_salvar');
  Route::get('/usuario/{id}/editar', 'UsuarioController@editar')->name('usuario_editar');
  Route::put('/usuario/{id}', 'UsuarioController@atualizar')->name('usuario_atualizar');
  Route::delete('/usuario/{id}', 'UsuarioController@apagar')->name('usuario_apagar');


});
