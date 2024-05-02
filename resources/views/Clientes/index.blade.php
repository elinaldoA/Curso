@extends('layouts.admin')

@section('main-content')
    <div class="card mt-3 mb-4 border-light shadow">
        <div class="card-header d-flex justify-content-between">
            <span>Pesquisar</span>
        </div>

        <div class="card-body">
            <form action="{{ route('cliente.index') }}">
                <div class="row">

                    <div class="col-md-3 col-sm-12">
                        <label class="form-label" for="name">Nome</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $name }}"
                            placeholder="Nome do cliente" />
                    </div>

                    <div class="col-md-3 col-sm-12 mt-3 pt-4">
                        <button type="submit" class="btn btn-info btn-sm">Pesquisar</button>
                        <a href="{{ route('cliente.index') }}" class="btn btn-warning btn-sm">Limpar</a>
                    </div>

                </div>

            </form>
        </div>
    </div>

    <div class="card mt-4 mb-4 border-light shadow">
        <div class="card-header d-flex justify-content-between">
            <span>Listar Clientes</span>
            <span>
                <a href="{{ route('cliente.create') }}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i></a>

                <a href="{{ url('clientes/gerar-pdf-cliente?' . request()->getQueryString()) }}" class="btn btn-warning btn-sm"><i class="fa fa-file-pdf-o"></i></a>

                <a href="{{ url('gerar-csv-cliente?' . request()->getQueryString()) }}" class="btn btn-success btn-sm"><i class="fa fa-file-excel-o"></i></a>

                <a href="{{ url('gerar-word-cliente?' . request()->getQueryString()) }}" class="btn btn-primary btn-sm"><i class="fa fa-file-word-o"></i></a>

            </span>
        </div>

        {{-- Verificar se existe a sessão success e imprimir o valor --}}
        <x-alert />

        <div class="card-body" style="overflow-x:auto;">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome Completo</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Criado em:</th>
                        <th scope="col">Situação</th>
                        <th scope="col" class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($clientes as $cliente)
                        <tr>
                            <td>{{ $cliente->id }}</td>
                            <td>{{ $cliente->name }} {{ $cliente->last_name }}</td>
                            <td>{{ $cliente->email}}</td>
                            <td>{{ \Carbon\Carbon::parse($cliente->created_at)->tz('America/Sao_Paulo')->format('d/m/Y') }}
                            </td>

                            <td>
                                <a href="{{ route('cliente.change-situation', ['cliente' => $cliente->id]) }}">
                                    @if($cliente->active == '1')
                                        <span class="badge badge-success">Ativo</span>
                                        @else
                                        <span class="badge badge-danger">Inativo</span>
                                    @endif
                                </a>
                            </td>

                            <td class="d-md-flex justify-content-center">
                                <a href="{{ route('cliente.show', ['cliente' => $cliente->id]) }}"
                                    class="btn btn-primary btn-sm me-1"><i class="fa fa-eye"></i></a>

                                <a href="{{ route('cliente.edit', ['cliente' => $cliente->id]) }}"
                                    class="btn btn-warning btn-sm me-1"><i class="fa fa-edit"></i></a>

                                <form id="formExcluir{{ $cliente->id }}"
                                    action="{{ route('cliente.destroy', ['cliente' => $cliente->id]) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm me-1 btnDelete"
                                        data-delete-id="{{ $cliente->id }}"><i class="fa fa-trash"></i></button>
                                </form>

                            </td>
                        </tr>
                    @empty
                        <h5><span style="color: #f00;">Nenhum cliente encontrado!</span></h5>
                    @endforelse
                </tbody>
            </table>

            {{ $clientes->onEachSide(0)->links() }}
        </div>
    </div>
@endsection
