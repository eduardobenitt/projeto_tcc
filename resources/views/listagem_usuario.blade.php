@extends('template')

@section('content')
    <h1>Listagem de Usuarios</h1>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">E-mail</th>
                <th scope="col">Máquina</th>
                <th scope="col">Ramal</th>
                <th scope="col">Setor</th>
                <th scope="col">Localização</th>
                <th scope="col">Unidade</th>
                <th scope="col">Turno</th>
                <th scope="col">Função</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $usuario)
                <tr>
                    <th scope="row">{{$usuario->nome}}</th>
                    <td>{{ $usuario->email }}</td>
                    <td>{{ $usuario->maquina}}</td>
                    <td>{{ $usuario->ramal}}</td>
                    <td>{{ $usuario->setor}}</td>
                    <td>{{ $usuario->localizacao}}</td>
                    <td>{{ $usuario->unidade}}</td>
                    <td>{{ $usuario->turno}}</td>
                    <td>{{ $usuario->funcao}}</td>
                </tr>
            @endforeach


        </tbody>
    </table>
@endsection
