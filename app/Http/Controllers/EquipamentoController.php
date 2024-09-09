<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Equipamento;
use App\Http\Requests\EquipamentoRequest;

class EquipamentoController extends Controller
{
    function listar() {
        $equipamentos = Equipamento::orderBy('patrimonio')->get();
        return view("listagem_equipamento", compact('equipamentos'));
    }
}
