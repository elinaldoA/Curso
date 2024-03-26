<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Clientes</title>
</head>

<body style="font-size: 12px;">
    <h2 style="text-align: center">clientes</h2>

    <table style="border-collapse: collapse; width: 100%;">
        <thead>
            <tr style="background-color: #adb5bd;">
                <th style="border: 1px solid #ccc;">ID</th>
                <th style="border: 1px solid #ccc;">Nome</th>
                <th style="border: 1px solid #ccc;">Sobrenome</th>
                <th style="border: 1px solid #ccc;">E-mail</th>
                <th style="border: 1px solid #ccc;">Situação</th>
                <th style="border: 1px solid #ccc;">Criado em:</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($clientes as $cliente)
                <tr>
                    <td style="border: 1px solid #ccc; border-top: none;">{{ $cliente->id }}</td>
                    <td style="border: 1px solid #ccc; border-top: none;">{{ $cliente->name }}</td>
                    <td style="border: 1px solid #ccc; border-top: none;">{{ $cliente->last_name }}</td>
                    <td style="border: 1px solid #ccc; border-top: none;">{{ $cliente->email }}</td>
                    @if($cliente->active = '1')
                    <td style="border: 1px solid #ccc; border-top: none;">Ativo</td>
                        @else
                    <td style="border: 1px solid #ccc; border-top: none;">Inativo</td>
                    @endif
                    <td style="border: 1px solid #ccc; border-top: none;">{{ \Carbon\Carbon::parse($cliente->created_at)->tz('America/Sao_Paulo')->format('d/m/Y') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Nenhuma cliente encontrada!</td>
                </tr>
            @endforelse

        </tbody>

    </table>
</body>

</html>
