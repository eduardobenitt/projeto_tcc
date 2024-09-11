<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Equipamento;
use App\Models\Maquina; // Carregar o model de Máquina
use App\Http\Requests\EquipamentoRequest;
use App\Models\Produto; // Carregar o model de Produto
use App\Models\Fabricante; // Carregar o model de Fabricante

class EquipamentoController extends Controller
{
    function listar() {
        $equipamentos = Equipamento::orderBy('patrimonio')->get();
        return view("listagem_equipamento", compact('equipamentos'));
    }

    function novo() {
        $equipamento = new Equipamento();
        $equipamento->id = 0;
        
        $produtos = Produto::orderBy('nome')->get(); // Obter os produtos
        $fabricantes = Fabricante::orderBy('id')->get(); // Obter os fabricantes
        $maquinas = Maquina::orderBy('patrimonio')->get(); // Obter as máquinas disponíveis
        
        return view("formulario_equipamento", compact('equipamento', 'produtos', 'fabricantes', 'maquinas'));
    }

    function salvar(EquipamentoRequest $request){

        if($request->input('id') == 0){
            $equipamento = new Equipamento();
        } else {
            $equipamento = Equipamento::find($request->input('id'));
        }

        $equipamento->patrimonio = $request->input('patrimonio');
        $equipamento->id_produto = $request->input('id_produto');
        $equipamento->id_fabricante = $request->input('id_fabricante');
        $equipamento->id_maquina = $request->input('id_maquina'); // Salvar o ID da máquina vinculada
        $equipamento->save();

        return redirect('equipamento/listar');
    }

    function editar($id){
        $equipamento = Equipamento::find($id);

        $produtos = Produto::orderBy('nome')->get(); 
        $fabricantes = Fabricante::orderBy('nome')->get();
        $maquinas = Maquina::orderBy('patrimonio')->get();
        
        return view("formulario_equipamento", compact('equipamento', 'produtos', 'fabricantes', 'maquinas'));
    }

    function excluir($id){
        $equipamento = Equipamento::find($id);
        $equipamento->delete();
        return redirect('equipamento/listar');
    }
}
