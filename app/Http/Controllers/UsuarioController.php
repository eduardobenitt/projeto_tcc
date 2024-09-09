<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Http\Requests\UsuarioRequest;

class UsuarioController extends Controller
{
    function listar(){
        $usuarios = Usuario::orderBy('nome')->get();
        return view("listagem_usuario", compact('usuarios'));
    }
}
