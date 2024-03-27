@extends('layouts.cliente.menu')

@section('main-content')
    <div class="card mt-3 mb-4 border-light shadow">
        <div class="card-header d-flex justify-content-between">
            <span>Pesquisar</span>
        </div>

        <div class="card-body">
            <form action="{{ route('conta.cliente.index') }}">
                <div class="row">

                    <div class="col-md-3 col-sm-12">
                        <label class="form-label" for="nome">Nome</label>
                        <input type="text" name="nome" id="nome" class="form-control" value="{{ $nome }}"
                            placeholder="Nome da conta" />
                    </div>

                    <div class="col-md-3 col-sm-12">
                        <label class="form-label" for="data_inicio">Data Início</label>
                        <input type="date" name="data_inicio" id="data_inicio" class="form-control"
                            value="{{ $data_inicio }}" />
                    </div>

                    <div class="col-md-3 col-sm-12">
                        <label class="form-label" for="data_fim">Data Fim</label>
                        <input type="date" name="data_fim" id="data_fim" class="form-control"
                            value="{{ $data_fim }}" />
                    </div>

                    <div class="col-md-3 col-sm-12 mt-3 pt-4">
                        <button type="submit" class="btn btn-info btn-sm">Pesquisar</button>
                        <a href="{{ route('conta.cliente.index') }}" class="btn btn-warning btn-sm">Limpar</a>
                    </div>

                </div>

            </form>
        </div>
    </div>

    <div class="card mt-4 mb-4 border-light shadow">
        <div class="card-header d-flex justify-content-between">
            <span>Listar Contas</span>
            <span>
                <a href="{{ route('conta.cliente.create') }}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i></a>

                <a href="{{ url('cliente/gerar-pdf-conta?' . request()->getQueryString()) }}" class="btn btn-warning btn-sm"><i class="fa fa-file-pdf-o"></i></a>

                <a href="{{ url('cliente/gerar-csv-conta?' . request()->getQueryString()) }}" class="btn btn-success btn-sm"><i class="fa fa-file-excel-o"></i></a>

                <a href="{{ url('cliente/gerar-word-conta?' . request()->getQueryString()) }}" class="btn btn-primary btn-sm"><i class="fa fa-file-word-o"></i></a>

            </span>
        </div>

        {{-- Verificar se existe a sessão success e imprimir o valor --}}
        <x-alert />

        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Vencimento</th>
                        <th scope="col">Situação</th>
                        <th scope="col" class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($contas as $conta)
                        @if(Auth::user()->id == $conta->cliente_id)
                        <tr>
                            <td>{{ $conta->nome }}</td>
                            <td>{{ 'R$ ' . number_format($conta->valor, 2, ',', '.') }}</td>
                            <td>{{ \Carbon\Carbon::parse($conta->vencimento)->tz('America/Sao_Paulo')->format('d/m/Y') }}
                            </td>

                            <td>
                                <a href="{{ route('conta.cliente.change-situation', ['conta' => $conta->id]) }}">
                                    {!! '<span class="badge text-bg-' . $conta->situacaoConta->cor . '">' . $conta->situacaoConta->nome . '</span>' !!}
                                </a>
                            </td>

                            <td class="d-md-flex justify-content-center">
                                <a href="{{ route('conta.cliente.show', ['conta' => $conta->id]) }}"
                                    class="btn btn-primary btn-sm me-1"><i class="fa fa-eye"></i></a>

                                <a href="{{ route('conta.cliente.edit', ['conta' => $conta->id]) }}"
                                    class="btn btn-warning btn-sm me-1"><i class="fa fa-edit"></i></a>

                                <form id="formExcluir{{ $conta->id }}"
                                    action="{{ route('conta.cliente.destroy', ['conta' => $conta->id]) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm me-1 btnDelete"
                                        data-delete-id="{{ $conta->id }}"><i class="fa fa-trash"></i></button>
                                </form>

                            </td>
                        </tr>
                        @endif
                    @empty
                        <h5><span style="color: #f00;">Nenhuma conta encontrada!</span></h5>
                    @endforelse
                </tbody>
            </table>

            {{ $contas->onEachSide(0)->links() }}
        </div>
    </div>
@endsection
