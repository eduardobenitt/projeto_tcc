@extends('template')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h1>Formulário de Equipamento</h1>
    <form action="{{ url('equipamento/salvar') }}" method="POST" enctype="multipart/form-data">

        @csrf

        <div class="form-group">
            <label for="patrimonio">Patrimônio</label>
            <input type="number" class="form-control" id="patrimonio" name="patrimonio" value="{{ $equipamento->patrimonio }}">
        </div>

        <div class="form-group">
            <label for="id_produto">Produto</label>
            <select class="form-select" id="id_produto" name="id_produto">
                @foreach ($produtos as $produto )
                    <option 
                    @if ($produto->id == $equipamento->id_produto)
                        selected
                    @endif
                    value="{{ $produto->id }}">{{ $produto->nome }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="id_fabricante">Fabricante</label>
            <select class="form-select" id="id_fabricante" name="id_fabricante">
                @foreach ($fabricantes as $fabricante )
                    <option 
                    @if ($fabricante->id == $equipamento->id_fabricante)
                        selected
                    @endif
                    value="{{ $fabricante->id }}">{{ $fabricante->nome }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="id_maquina">Máquina Vinculada</label>
            <select class="form-select" id="id_maquina" name="id_maquina">
                @foreach ($maquinas as $maquina)
                    <option 
                    @if ($maquina->id == $equipamento->id_maquina)
                        selected
                    @endif
                    value="{{ $maquina->id }}">{{ $maquina->patrimonio }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
@endsection
