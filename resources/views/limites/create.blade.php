@extends('layouts.admin')

@section('main-content')
    <div class="card mt-4 mb-4 border-light shadow">
        <div class="card-header d-flex justify-content-between">
            <span>Cadastrar Limite</span>
            <span>
                <a href="{{ route('limite.index') }}" class="btn btn-info btn-sm ">Listar</a>
            </span>
        </div>

        {{-- Verificar se existe a sessão success e imprimir o valor --}}
        <x-alert />

        <div class="card-body">

            <form action="{{ route('limite.store') }}" method="POST" class="row g-3">
                @csrf

                <div class="col-md-4 col-sm-12">
                    <label for="valor" class="form-label">Valor</label>
                    <input type="text" name="valor" class="form-control" id="valor" placeholder="Valor da conta"
                        value="{{ old('valor') }}">
                </div>
                
                <div class="col-md-4 col-sm-12" hidden="true">
                    <label for="user_id" class="form-label">Usuário da Conta</label>
                    <select name="user_id" id="user_id" class="form-control form-select">
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
