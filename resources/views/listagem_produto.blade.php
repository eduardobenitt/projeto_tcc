@extends('template')

@section('content')
    <h1>Listagem de Produtos</h1>
    <a href="novo" class="btn btn-primary">Novo Produto</a>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Editar</th>
                <th scope="col">Excluir</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produtos as $produto)
                <tr>
                    <th scope="row">{{ $produto->id }}</th>
                    <td>{{ $produto->nome }}</td>
                    <td><a class="btn btn-primary" href="editar/{{ $produto->id }}">+</a></td>
                    <td><a class="btn btn-danger"
                            onclick="return confirm('Confirme a remoção do registro?')"href="excluir/{{ $produto->id }}">-</a>
                    </td>
                </tr>
            @endforeach


        </tbody>
    </table>
@endsection
