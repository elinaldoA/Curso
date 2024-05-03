@extends('layouts.cliente.menu')

@section('main-content')

<div class="card mt-4 mb-4 border-light shadow">
    <div class="card-header d-flex justify-content-between">
        <span>Listar limites</span>
        <span>
            <a href="{{ route('limite.cliente.create') }}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i></a>

        </span>
    </div>

    {{-- Verificar se existe a sessão success e imprimir o valor --}}
    <x-alert />

    <div class="card-body" style="overflow-x:auto">
        <table class="table table-hover table-sm">
            <thead>
                <tr>
                    <th scope="col">Valor</th>
                    <th scope="col">Criado</th>
                    <th scope="col">Situação</th>
                    <th scope="col" class="text-center">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($limites as $limite)
                @if(Auth::user()->id == $limite->cliente_id)
                <tr>
                    <td>{{ 'R$ ' . number_format($limite->valor, 2, ',', '.') }}</td>
                    <td>{{ \Carbon\Carbon::parse($limite->created_at)->tz('America/Sao_Paulo')->format('d/m/Y') }}
                    </td>

                    <td class="d-md-flex justify-content-center">
                        <a href="{{ route('limite.cliente.show', ['limite' => $limite->id]) }}" class="btn btn-primary btn-sm me-1"><i class="fa fa-eye"></i></a>

                        <a href="{{ route('limite.cliente.edit', ['limite' => $limite->id]) }}" class="btn btn-warning btn-sm me-1"><i class="fa fa-edit"></i></a>

                        <form id="formExcluir{{ $limite->id }}" action="{{ route('limite.cliente.destroy', ['limite' => $limite->id]) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger btn-sm me-1 btnDelete" data-delete-id="{{ $limite->id }}"><i class="fa fa-trash"></i></button>
                        </form>

                    </td>
                </tr>
                @endif
                @empty
                <h5><span style="color: #f00;">Nenhuma limite encontrada!</span></h5>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection