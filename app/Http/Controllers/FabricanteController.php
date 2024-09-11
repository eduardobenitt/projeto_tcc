<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Fabricante;
use App\Http\Requests\FabricanteRequest;

class FabricanteController extends Controller
{
    function listar(){
        $fabricantes = Fabricante::orderBy('id')->get();
        return view("listagem_fabricante", compact('fabricantes'));
    }

    function novo() {
        $fabricante = new Fabricante();
        $fabricante->id = 0;
        return view("formulario_fabricante", compact('fabricante'));
    }

    function salvar(FabricanteRequest $request){

        if($request->input('id') == 0){
            $fabricante = new Fabricante();
        } else {
            $fabricante = Fabricante::find($request->input('id'));
        }

        $fabricante->nome = $request->input('nome');
        $fabricante->save();
        return redirect('fabricante/listar');
    }

    function editar($id){
        $fabricante = Fabricante::find($id);
        return view("formulario_fabricante", compact('fabricante'));
    }

    function excluir($id){
        $fabricante = Fabricante::find($id);
        $fabricante->delete();
        return redirect('fabricante/listar');
    }
}
