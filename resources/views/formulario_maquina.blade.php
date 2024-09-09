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

    <h1>Formulário de Maquina</h1>

    @if ($maquina->imagem != "")
     <img src="/storage/imagens/{{ $maquina->imagem }}" style="height: 100px">   
    @endif

    <form action="{{ url('maquina/salvar') }}" method="POST" enctype="multipart/form-data">

        @csrf

        <input type="hidden" id="id" name="id" value="{{ $maquina->id }}">

        <div class="form-group">
            <label for="patrimonio">Patrimônio</label>
            <input type="number" class="form-control" id="patrimonio" name="patrimonio" value="{{ $maquina->patrimonio }}">
        </div>
        <div class="form-group">
            <label for="fabricante">Fabricante</label>
            <select class="form-select" id="id_fabricante" name="id_fabricante">
                @foreach ($fabricantes as $fabricante )
                    <option 
                    @if ($fabricante->id == $maquina->id_fabricante)
                        selected
                    @endif
                    value="{{ $fabricante->id }}">{{ $fabricante->nome }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="usuario">Usuario</label>
            <select class="form-select" id="id_usuario" name="id_usuario">
                @foreach ($usuarios as $usuario )
                <option 
                @if ($usuario->id == $maquina->id_usuario)
                    selected
                @endif
                value="{{ $usuario->id }}">{{ $usuario->nome }}</option>
            @endforeach  
            </select>
        </div>

        <div class="form-group">
            <label for="arquivo"> Foto</label>
            <input type="file" class="form-control" id="arquivo" name="arquivo" accept="image/*">
        </div>


        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
@endsection
