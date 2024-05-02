@extends('layouts.admin')

@section('main-content')
    <div class="card mt-4 mb-4 border-light shadow">
        <div class="card-header d-flex justify-content-between">
            <span>Editar</span>
            <span>
                <a href="{{ route('limite.index') }}" class="btn btn-info btn-sm ">Listar</a>
                <a href="{{ route('limite.show', ['limite' => $limite->id]) }}" class="btn btn-primary btn-sm">Visualizar</a>
            </span>
        </div>

        {{-- Verificar se existe a sessão success e imprimir o valor --}}
        <x-alert />

        <div class="card-body">

            <form action="{{ route('limite.update', ['limite' => $limite->id]) }}" method="POST" class="row g-3">
                @csrf
                @method('PUT')
                
                <div class="col-md-4 col-sm-12">
                    <label for="valor" class="form-label">Valor</label>
                    <input type="text" name="valor" class="form-control" id="valor" placeholder="Valor da limite"
                        value="{{ old('valor', isset($limite->valor) ? number_format($limite->valor, '2', ',', '.') : '') }}">
                </div>

                <div class="col-md-4 col-sm-12" hidden="true">
                    <label for="user_id" class="form-label">Usuário da limite</label>
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
