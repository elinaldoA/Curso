@extends('layouts.admin')

@section('main-content')
    <div class="card mt-4 mb-4 border-light shadow">
        <div class="card-header d-flex justify-content-between">
            <span>Visualizar limite</span>
            <span>
                <a href="{{ route('limite.index') }}" class="btn btn-info btn-sm ">Listar</a>
                <a href="{{ route('limite.edit', ['limite' => $limite->id]) }}" class="btn btn-warning btn-sm">Editar</a>
            </span>
        </div>

        {{-- Verificar se existe a sessão success e imprimir o valor --}}
        <x-alert />

        <div class="card-body">

            <dl class="row">

                <dt class="col-sm-3">Valor</dt>
                <dd class="col-sm-9">{{ 'R$ ' . number_format($limite->valor, 2, ',', '.') }}</dd>

                <dt class="col-sm-3">Criado</dt>
                <dd class="col-sm-9">{{ \Carbon\Carbon::parse($limite->created_at)->tz('America/Sao_Paulo')->format('d/m/Y') }}</dd>

                <dt class="col-sm-3">Editado</dt>
                <dd class="col-sm-9">{{ \Carbon\Carbon::parse($limite->updated_at)->tz('America/Sao_Paulo')->format('d/m/Y H:i:s') }}</dd>

            </dl>

        </div>
    </div>
@endsection
