@extends('layouts.admin')

@section('main-content')
    <div class="card mt-4 mb-4 border-light shadow">
        <div class="card-header d-flex justify-content-between">
            <span>Visualizar Cliente</span>
            <span>
                <a href="{{ route('cliente.index') }}" class="btn btn-info btn-sm ">Listar</a>
                <a href="{{ route('cliente.edit', ['cliente' => $cliente->id]) }}" class="btn btn-warning btn-sm">Editar</a>
            </span>
        </div>

        {{-- Verificar se existe a sessão success e imprimir o valor --}}
        <x-alert />

        <div class="card-body">

            <dl class="row">

                <dt class="col-sm-3">ID</dt>
                <dd class="col-sm-9">{{ $cliente->id }}</dd>

                <dt class="col-sm-3">Nome</dt>
                <dd class="col-sm-9">{{ $cliente->name }}</dd>

                <dt class="col-sm-3">Sobrenome</dt>
                <dd class="col-sm-9">{{ $cliente->last_name }}</dd>

                <dt class="col-sm-3">E-mail</dt>
                <dd class="col-sm-9">{{ $cliente->email }}</dd>

                <dt class="col-sm-3">Situação</dt>
                <dd class="col-sm-9">
                    <a href="{{ route('cliente.change-situation', [ 'cliente' => $cliente->id])}}">
                        @if($cliente->active = '1')
                            <span class="badge badge-success">Ativo</span>
                            @else
                            <span class="badge badge-danger">Inativo</span>
                        @endif
                    </a>
                </dd>

                <dt class="col-sm-3">Cadastrado</dt>
                <dd class="col-sm-9">{{ \Carbon\Carbon::parse($cliente->created_at)->tz('America/Sao_Paulo')->format('d/m/Y H:i:s') }}</dd>

                <dt class="col-sm-3">Editado</dt>
                <dd class="col-sm-9">{{ \Carbon\Carbon::parse($cliente->updated_at)->tz('America/Sao_Paulo')->format('d/m/Y H:i:s') }}</dd>

            </dl>

        </div>
    </div>
@endsection
