<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Produto;
use App\Http\Requests\ProdutoRequest;

class ProdutoController extends Controller
{
    function listar(){
        $produtos = Produto::orderBy('id')->get();
        return view("listagem_produto", compact('produtos'));
    }

    function novo() {
        $produto = new Produto();
        $produto->id = 0;
        return view("formulario_produto", compact('produto'));
    }

    function salvar(ProdutoRequest $request){

        if($request->input('id') == 0){
            $produto = new Produto();
        } else {
            $produto = Produto::find($request->input('id'));
        }

        $produto->nome = $request->input('nome');
        $produto->save();
        return redirect('produto/listar');
    }

    function editar($id){
        $produto = Produto::find($id);
        return view("formulario_produto", compact('produto'));
    }

    function excluir($id){
        $produto = Produto::find($id);
        $produto->delete();
        return redirect('produto/listar');
    }
}
