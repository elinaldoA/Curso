@extends('layouts.admin')

@section('main-content')
    <div class="card mt-4 mb-4 border-light shadow">
        <div class="card-header d-flex justify-content-between">
            <span>Cadastrar Cliente</span>
            <span>
                <a href="{{ route('cliente.index') }}" class="btn btn-info btn-sm ">Listar</a>
            </span>
        </div>

        {{-- Verificar se existe a sessão success e imprimir o valor --}}
        <x-alert />

        <div class="card-body">

            <form action="{{ route('cliente.store') }}" method="POST" class="row g-3">
                @csrf

                <div class="col-md-6 col-sm-12">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Nome"
                        value="{{ old('name') }}">
                </div>

                <div class="col-md-6 col-sm-12">
                    <label for="last_name" class="form-label">Sobrenome</label>
                    <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Sobrenome"
                        value="{{ old('last_name') }}">
                </div>

                <div class="col-md-4 col-sm-12">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="E-mail do cliente"
                        value="{{ old('email') }}">
                </div>

                <div class="col-md-4 col-sm-12">
                    <label for="password" class="form-label">Senha</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Senha do cliente"
                        value="{{ old('senha') }}">
                </div>

                <div class="col-md-4 col-sm-12">
                    <label for="active" class="form-label">Situação da Conta</label>
                    <select name="active" id="active" class="form-control form-select select2">
                        <option value="1">Ativo</option>
                        <option value="0">Inativo</option>
                    </select>
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-success btn-sm">Cadastrar</button>
                </div>

            </form>

        </div>
    </div>
@endsection
