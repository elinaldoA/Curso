@extends('layouts.cliente.menu')

@section('main-content')
    <div class="card mt-4 mb-4 border-light shadow">
        <div class="card-header d-flex justify-content-between">
            <span>Cadastrar receita</span>
            <span>
                <a href="{{ route('receita.cliente.index') }}" class="btn btn-info btn-sm ">Listar</a>
            </span>
        </div>

        {{-- Verificar se existe a sessão success e imprimir o valor --}}
        <x-alert />

        <div class="card-body">

            <form action="{{ route('receita.cliente.store') }}" method="POST" class="row g-3">
                @csrf

                <div class="col-md-6 col-sm-12">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome da receita"
                        value="{{ old('nome') }}">
                </div>

                <div class="col-md-6 col-sm-12">
                    <label for="valor" class="form-label">Valor</label>
                    <input type="text" name="valor" class="form-control" id="valor" placeholder="Valor da receita"
                        value="{{ old('valor') }}">
                </div>

                <div class="col-md-4 col-sm-12" hidden="true">
                    <label for="cliente_id" class="form-label">Usuário da receita</label>
                    <select name="cliente_id" id="cliente_id" class="form-control form-select">
                        <option value="{{Auth::user()->id}}">{{Auth::user()->name}}</option>
                    </select>
                </div>

                <div class="col-12">
                    <br/>
                    <button type="submit" class="btn btn-success btn-sm">Cadastrar</button>
                </div>

            </form>

        </div>
    </div>
@endsection
