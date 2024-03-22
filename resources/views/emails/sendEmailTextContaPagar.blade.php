Olá,

Contas a pagar:

@foreach ($contas as $conta)
    - {{ $conta->nome }}: R$ {{ number_format($conta->valor, 2, ',', '.') }} - {{ $conta->situacaoConta->nome }} - {{ \Carbon\Carbon::parse($conta->vencimento)->format('d/m/Y') }}
@endforeach


E-mail enviado pelo sistema Gestor de contas.

