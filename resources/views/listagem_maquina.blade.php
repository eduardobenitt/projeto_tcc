@extends('template')

@section('content')
    <h1>Listagem de Maquinas</h1>
    <a href="novo" class="btn btn-primary">Novo Maquina</a>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">Patrimônio</th>
                <th scope="col">Fabricantse</th>
                <th scope="col">Usuario</th>
                <th scope="col">Imagem</th>
                <th scope="col">Editar</th>
                <th scope="col">Excluir</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($maquinas as $maquina)
                <tr>
                    <th scope="row">{{ $maquina->patrimonio}}</th>
                    <td>{{ $maquina->fabricante->nome}}</td>
                    <td>{{ $maquina->usuario->nome}}</td>
                    <td>
                        @if ($maquina->imagem !="")
                            <img src="/storage/imagens/{{ $maquina->imagem }}" style="width: 40px">
                        @endif
                    </td>
                    <td><a class="btn btn-primary" href="editar/{{ $maquina->id }}">+</a></td>
                    <td><a class="btn btn-danger"
                            onclick="return confirm('Confirme a remoção do registro?')"href="excluir/{{ $maquina->id }}">-</a>
                    </td>
                </tr>
            @endforeach


        </tbody>
    </table>
@endsection
