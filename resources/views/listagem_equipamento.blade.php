@extends('template')

@section('content')
    <h1>Listagem de Equipamentos</h1>
    <a href="novo" class="btn btn-primary">Novo Equipamento</a>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">Patrimônio</th>
                <th scope="col">Produto</th>
                <th scope="col">Fabricante</th>
                <th scope="col">Máquina Vinculada</th>
                <th scope="col">Editar</th>
                <th scope="col">Excluir</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($equipamentos as $equipamento)
            <tr>
            <th scope="row">{{$equipamento->patrimonio}}</th>
            <td>{{$equipamento->produto->nome}}</td>
            <td>{{$equipamento->fabricante->nome}}</td>
            <td>{{$equipamento->maquina->patrimonio}}</td>
            <td><a class="btn btn-primary" href="editar/{{$equipamento->patrimonio}}">+</a></td>
            <td><a class="btn btn-danger" onclick="return confirm('Confirme a remoção do registro?')" href="excluir/{{$equipamento->patrimonio}}">-</a></td>
            </tr>
        @endforeach


        </tbody>
    </table>
@endsection
