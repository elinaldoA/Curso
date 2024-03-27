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

                <div class="col-md-6 col-sm-12">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Nome do cliente"
                        value="{{ old('name', $cliente->name) }}">
                </div>

                <div class="col-md-6 col-sm-12">
                    <label for="nome" class="form-label">Sobrenome</label>
                    <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Sobrenome"
                        value="{{ old('last_name', $cliente->last_name) }}">
                </div>

                <div class="col-md-6 col-sm-12">
                    <label for="nome" class="form-label">E-mail</label>
                    <input type="text" name="email" class="form-control" id="email" placeholder="E-mail"
                        value="{{ old('email', $cliente->email) }}">
                </div>

                <div class="col-md-6 col-sm-12" hidden="true">
                    <label for="password" class="form-label">Senha</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="senha"
                        value="{{ old('password', $cliente->password) }}">
                </div>

                <div class="col-md-6 col-sm-12">
                    <label for="active" class="form-label">Situação da cliente</label>
                    <select name="active" id="active" class="form-select select2">
                        @if($cliente->active == '1')
                        <option value="{{ old('active', $cliente->active) }}" {{ old('active', $cliente->active) == $cliente->active ? 'selected' : '' }}>Ativo</option>
                        @else
                        <option value="{{ old('active', $cliente->active) }}" {{ old('active', $cliente->active) == $cliente->active ? 'selected' : '' }}>Inativo</option>@endif
                    </select>
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-warning btn-sm">Salvar</button>
                </div>

            </form>

        </div>
    </div>
@endsection
