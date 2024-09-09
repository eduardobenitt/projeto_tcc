<?php

use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\MaquinaController;
use App\Http\Controllers\FabricanteController;
use App\Http\Controllers\EquipamentoController;

use Illuminate\Support\Facades\Route;


// Página inicial
Route::get('/', function () {return view('index');});

// Rotas de Equipamentos
Route::get('equipamento/listar',[EquipamentoController::class,'listar']);
Route::get('equipamento/novo',[EquipamentoController::class,'novo']);


// Rotas de Fabricantes
Route::get('fabricante/listar',[FabricanteController::class,'listar']);
Route::get('fabricante/novo',[FabricanteController::class,'novo']);

// Rotas de Máquinas
Route::get('maquina/listar',[MaquinaController::class,'listar']);
Route::get('maquina/novo',[MaquinaController::class,'novo']);
Route::post('maquina/salvar',[MaquinaController::class,'salvar']);
Route::get('maquina/editar/{id}', [MaquinaController::class,'editar']);
Route::get('maquina/excluir/{id}', [MaquinaController::class,'excluir']);

// Rotas de Produtos
Route::get('produto/listar',[ProdutoController::class,'listar']);
Route::get('produto/novo',[ProdutoController::class,'novo']);

// Rotas de Usuário
Route::get('usuario/listar',[UsuarioController::class, 'listar']);

