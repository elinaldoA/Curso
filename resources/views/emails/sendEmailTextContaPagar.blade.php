Olá, {{Auth::user()->name}}

Contas a pagar:

@foreach ($contas as $conta)
    @if(Auth::user()->id == $conta->user_id)
    - {{ $conta->nome }}: R$ {{ number_format($conta->valor, 2, ',', '.') }} - {{ $conta->situacaoConta->nome }} - {{ \Carbon\Carbon::parse($conta->vencimento)->format('d/m/Y') }}
    @endif
@endforeach


E-mail enviado pelo sistema Gestor de contas.

