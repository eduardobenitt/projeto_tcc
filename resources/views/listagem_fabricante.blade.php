@extends('template')

@section('content')
    <h1>Listagem de Fabricantes</h1>
    <a href="novo" class="btn btn-primary">Novo Fabricante</a>
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
            @foreach ($fabricantes as $fabricante)
                <tr>
                    <th scope="row">{{ $fabricante->id }}</th>
                    <td>{{ $fabricante->nome }}</td>
                    <td><a class="btn btn-primary" href="editar/{{ $fabricante->id }}">+</a></td>
                    <td><a class="btn btn-danger"
                            onclick="return confirm('Confirme a remoção do registro?')"href="excluir/{{ $fabricante->id }}">-</a>
                    </td>
                </tr>
            @endforeach


        </tbody>
    </table>
@endsection
