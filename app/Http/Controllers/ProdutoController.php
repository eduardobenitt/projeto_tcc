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
}
