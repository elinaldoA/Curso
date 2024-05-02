@extends('layouts.admin')

@section('main-content')
    <div class="card mt-4 mb-4 border-light shadow">
        <div class="card-header d-flex justify-content-between">
            <span>Editar</span>
            <span>
                <a href="{{ route('receita.index') }}" class="btn btn-info btn-sm ">Listar</a>
                <a href="{{ route('receita.show', ['receita' => $receita->id]) }}" class="btn btn-primary btn-sm">Visualizar</a>
            </span>
        </div>

        {{-- Verificar se existe a sessão success e imprimir o valor --}}
        <x-alert />

        <div class="card-body">

            <form action="{{ route('receita.update', ['receita' => $receita->id]) }}" method="POST" class="row g-3">
                @csrf
                @method('PUT')

                <div class="col-md-12 col-sm-12">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome da receita"
                        value="{{ old('nome', $receita->nome) }}">
                </div>

                <div class="col-md-4 col-sm-12">
                    <label for="valor" class="form-label">Valor</label>
                    <input type="text" name="valor" class="form-control" id="valor" placeholder="Valor da receita"
                        value="{{ old('valor', isset($receita->valor) ? number_format($receita->valor, '2', ',', '.') : '') }}">
                </div>

                <div class="col-md-4 col-sm-12" hidden="true">
                    <label for="user_id" class="form-label">Usuário da receita</label>
                    <select name="user_id" id="user_id" class="form-control form-select">
                        <option value="{{Auth::user()->id}}">{{Auth::user()->name}}</option>
                    </select>
                </div>
                <div class="col-12">
                    <br/>
                    <button type="submit" class="btn btn-warning btn-sm">Salvar</button>
                </div>

            </form>

        </div>
    </div>
@endsection
