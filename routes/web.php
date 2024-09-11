<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\MaquinaController;
use App\Http\Controllers\FabricanteController;
use App\Http\Controllers\EquipamentoController;
use App\Models\Equipamento;
use App\Models\Fabricante;

Route::get('/', function () {
    return view('index');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rotas de Equipamentos
Route::get('equipamento/listar',[EquipamentoController::class,'listar']);
Route::get('equipamento/novo',[EquipamentoController::class,'novo']);
Route::post('equipamento/salvar',[EquipamentoController::class,'salvar']);
Route::get('equipamento/editar/{id}',[EquipamentoController::class,'editar']);
Route::get('equipamento/excluir/{id}',[EquipamentoController::class,'excluir']);


// Rotas de Fabricantes
Route::get('fabricante/listar',[FabricanteController::class,'listar']);
Route::get('fabricante/novo',[FabricanteController::class,'novo']);
Route::post('fabricante/salvar',[FabricanteController::class,'salvar']);
Route::get('fabricante/editar/{id}',[FabricanteController::class,'editar']);
Route::get('fabricante/excluir/{id}',[FabricanteController::class,'excluir']);

// Rotas de Máquinas
Route::get('maquina/listar',[MaquinaController::class,'listar']);
Route::get('maquina/novo',[MaquinaController::class,'novo']);
Route::post('maquina/salvar',[MaquinaController::class,'salvar']);
Route::get('maquina/editar/{id}', [MaquinaController::class,'editar']);
Route::get('maquina/excluir/{id}', [MaquinaController::class,'excluir']);

// Rotas de Produtos
Route::get('produto/listar',[ProdutoController::class,'listar']);
Route::get('produto/novo',[ProdutoController::class,'novo']);
Route::post('produto/salvar',[ProdutoController::class,'salvar']);
Route::get('produto/editar/{id}',[ProdutoController::class,'editar']);
Route::get('produto/excluir/{id}',[ProdutoController::class,'excluir']);

// Rotas de Usuário
Route::get('usuario/listar',[UsuarioController::class, 'listar']);
});

require __DIR__.'/auth.php';
