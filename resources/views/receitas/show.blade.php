@extends('layouts.admin')

@section('main-content')
    <div class="card mt-4 mb-4 border-light shadow">
        <div class="card-header d-flex justify-content-between">
            <span>Visualizar receita</span>
            <span>
                <a href="{{ route('receita.index') }}" class="btn btn-info btn-sm ">Listar</a>
                <a href="{{ route('receita.edit', ['receita' => $receita->id]) }}" class="btn btn-warning btn-sm">Editar</a>
            </span>
        </div>

        {{-- Verificar se existe a sessão success e imprimir o valor --}}
        <x-alert />

        <div class="card-body">

            <dl class="row">

                <dt class="col-sm-3">Nome</dt>
                <dd class="col-sm-9">{{ $receita->nome }}</dd>

                <dt class="col-sm-3">Valor</dt>
                <dd class="col-sm-9">{{ 'R$ ' . number_format($receita->valor, 2, ',', '.') }}</dd>

                <dt class="col-sm-3">Criado</dt>
                <dd class="col-sm-9">{{ \Carbon\Carbon::parse($receita->created_at)->tz('America/Sao_Paulo')->format('d/m/Y') }}</dd>

                <dt class="col-sm-3">Editado</dt>
                <dd class="col-sm-9">{{ \Carbon\Carbon::parse($receita->updated_at)->tz('America/Sao_Paulo')->format('d/m/Y H:i:s') }}</dd>

            </dl>

        </div>
    </div>
@endsection
