<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Maquina;
use App\Http\Requests\MaquinaRequest;
use App\Models\Fabricante;
use App\Models\Usuario;
use Illuminate\Support\Facades\Storage;

class MaquinaController extends Controller
{
    function listar(){
        $maquinas = Maquina::orderBy('patrimonio')->get();
        return view("listagem_maquina", compact('maquinas'));
    }

    function novo(){
        $maquina = new Maquina();
        $maquina->patrimonio = 0;
        $fabricantes = Fabricante::orderBy('id')->get();
        $usuarios = Usuario::orderBy('nome')->get();
        return view("formulario_maquina", compact('maquina', 'fabricantes', 'usuarios'));
    }

    function salvar(MaquinaRequest $request){

        if($request->input('id') == 0){
            $maquina = new Maquina();
        }else{
            $maquina = Maquina::find($request->input('id'));
        }

        if($request->hasFile('arquivo')){
            $arquivo = $request->file('arquivo');
            $nomeArquivo = $arquivo->store('public/imagens');
            $vetorArquivo = explode('/', $nomeArquivo);
            if($maquina->imagem != ""){
                Storage::delete("public/imagens/".$maquina->imagem);
            }
            $maquina->imagem = $vetorArquivo[2];
        }
        $maquina->patrimonio = $request->input('patrimonio');
        $maquina->id_fabricante = $request->input('id_fabricante');
        $maquina->id_usuario = $request->input('id_usuario');
        $maquina->save();
        return redirect('/maquina/listar');
    }

    function editar($id){
        $maquina = Maquina::find($id);
        $fabricantes = Fabricante::orderBy('id')->get();
        $usuarios = Usuario::orderBy('nome')->get();
        return view("formulario_maquina", compact('maquina', 'fabricantes', 'usuarios'));
    }

    function excluir($id){
        $maquina = Maquina::find($id);
        if($maquina->imagem != ""){
            Storage::delete("public/imagens/".$maquina->imagem);
        }
        $maquina->delete();
        return redirect('maquina/listar');
    }
}
