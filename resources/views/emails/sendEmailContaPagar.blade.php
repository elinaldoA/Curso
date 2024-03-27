@extends('layouts.email')

@section('content')
    <p>Olá, {{Auth::user()->name}}</p>

    <p>Contas a pagar: </p>

    @foreach ($contas as $conta)
        @if(Auth::user()->id == $conta->user_id)
        - <strong><a href="{{ route('conta.show', ['conta' => $conta->id]) }}" style="text-decoration: none;">{{ $conta->nome }} </a></strong>: R$
        {{ number_format($conta->valor, 2, ',', '.') }} - {{ $conta->situacaoConta->nome }} -
        {{ \Carbon\Carbon::parse($conta->vencimento)->format('d/m/Y') }}<br>@endif
    @endforeach

    <br><br>
    <p>E-mail enviado pelo sistema Gestor de contas.</p>
@endsection
