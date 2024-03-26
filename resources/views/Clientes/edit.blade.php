@extends('layouts.admin')

@section('main-content')
    <div class="card mt-4 mb-4 border-light shadow">
        <div class="card-header d-flex justify-content-between">
            <span>Editar cliente</span>
            <span>
                <a href="{{ route('cliente.index') }}" class="btn btn-info btn-sm ">Listar</a>
                <a href="{{ route('cliente.show', ['cliente' => $cliente->id]) }}" class="btn btn-primary btn-sm">Visualizar</a>
            </span>
        </div>

        {{-- Verificar se existe a sessão success e imprimir o valor --}}
        <x-alert />

        <div class="card-body">

            <form action="{{ route('cliente.update', ['cliente' => $cliente->id]) }}" method="POST" class="row g-3">
                @csrf
                @method('PUT')

                <div class="col-md-12 col-sm-12">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Nome do cliente"
                        value="{{ old('name', $cliente->name) }}">
                </div>

                <div class="col-md-4 col-sm-12">
                    <label for="valor" class="form-label">Valor</label>
                    <input type="text" name="valor" class="form-control" id="valor" placeholder="Valor da cliente"
                        value="{{ old('valor', isset($cliente->valor) ? number_format($cliente->valor, '2', ',', '.') : '') }}">
                </div>

                <div class="col-md-4 col-sm-12">
                    <label for="active" class="form-label">Situação da cliente</label>
                    <select name="active" id="active" class="form-select select2">
                        <option value="">Selecione</option>
                        <option value="{{ $cliente->active }}"
                            {{ old('active', $cliente->active) == $cliente->id ? 'selected' : '' }}>
                            Ativo
                        </option>
                    </select>
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-warning btn-sm">Salvar</button>
                </div>

            </form>

        </div>
    </div>
@endsection
