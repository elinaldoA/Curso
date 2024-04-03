<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteRequest;
use App\Models\Cliente;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use PhpOffice\PhpWord\PhpWord;

class ClientesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //Lista todos os clientes cadastrados no sistema
        // Recuperar os registros do banco dados
        $clientes = Cliente::when($request->has('name'), function ($whenQuery) use ($request) {
            $whenQuery->where('name', 'like', '%' . $request->name . '%');
        })->orderByDesc('created_at')
            ->paginate(10)
            ->withQueryString();

        // Carregar a VIEW
        return view('Clientes.index', [
            'clientes' => $clientes,
            'name' => $request->name,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Tela de cadastro de clientes
        return view('Clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClienteRequest $request)
    {
        // Validar o formulário
        $request->validated();

        try {

            // Cadastra no banco de dados na tabela clientes os valores de todos os campos
            $cliente = Cliente::create([
                'name' => $request->name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'email_verified_at' => $request->email_verified_at,
                'password' => $request->password,
                'active' => $request->active,
            ]);

            // Redirecionar o usuário, enviar a mensagem de sucesso
            return redirect()->route('cliente.show', ['cliente' => $cliente->id])->with('success', 'Cliente cadastrado com sucesso');
        } catch (Exception $e) {

            // Salvar log
            Log::warning('Cliente não cadastrado', ['error' => $e->getMessage()]);

            // Redirecionar o usuário, enviar a mensagem de erro
            return back()->withInput()->with('error', 'Cliente não cadastrado!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        // Recuperar do banco de dados dos clientes
        $cliente = Cliente::find($cliente->id);

        // Carregar a VIEW
        return view('Clientes.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        // Recuperar do banco de dados dos clientes
        $cliente = Cliente::find($cliente->id);

        // Carregar a VIEW
        return view('Clientes.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClienteRequest $request, Cliente $cliente)
    {
        // Validar o formulário
        $request->validated();

        try {

            // Editar as informações do registro no banco de dados
            $cliente->update([
                'name' => $request->name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'email_verified_at' => $request->email_verified_at,
                'password' => $request->password,
                'active' => $request->active,
            ]);

            // Salvar log
            Log::info('cliente editado com sucesso', ['id' => $cliente->id, 'cliente' => $cliente]);

            // Redirecionar o usuário, enviar a mensagem de sucesso
            return redirect()->route('cliente.show', ['cliente' => $cliente->id])->with('success', 'cliente editado com sucesso');
        } catch (Exception $e) {

            // Salvar log
            Log::warning('cliente não editado', ['error' => $e->getMessage()]);

            // Redirecionar o usuário, enviar a mensagem de erro
            return back()->withInput()->with('error', 'cliente não editado!');
        }
    }

    // Gerar PDF
    public function gerarPdf(Request $request)
    {

        // Recuperar os registros do banco dados
        //$clientes = cliente::orderByDesc('created_at')->get();

        // Recuperar e pesquisar os registros do banco dados
        $clientes = Cliente::when($request->has('name'), function ($whenQuery) use ($request) {
            $whenQuery->where('name', 'like', '%' . $request->name . '%');
        })
            ->orderByDesc('created_at')
            ->get();

        // Carregar a string com o HTML/conteúdo e determinar a orientação e o tamanho do arquivo
        $pdf = PDF::loadView('clientes.gerar-pdf', [
            'clientes' => $clientes,
        ])->setPaper('a4', 'portrait');

        // Fazer o download do arquivo
        return $pdf->download('listar_clientes.pdf');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        // Excluir o registro do banco de dados
        $cliente->delete();

        // Redirecionar o usuário, enviar a mensagem de sucesso
        return redirect()->route('cliente.index')->with('success', 'Cliente apagado com sucesso');
    }
    // Alterar situação do cliente
    public function changeSituation(cliente $cliente)
    {

        try {

            // Editar as informações do registro no banco de dados
            $cliente->update([
                'active' => $cliente->active == 1 ? 0 : 1,
            ]);

            // Salvar log
            Log::info('Situação da cliente editado com sucesso', ['id' => $cliente->id, 'cliente' => $cliente]);

            // Redirecionar o usuário, enviar a mensagem de sucesso
            return back()->with('success', 'Situação do cliente editado com sucesso!');
        } catch (Exception $e) {

            // Salvar log
            Log::warning('Situação da cliente não editado', ['error' => $e->getMessage()]);

            // Redirecionar o usuário, enviar a mensagem de erro
            return back()->with('error', 'Situação do cliente não editado!');
        }
    }
    // Gerar CSV
    public function gerarCsv(Request $request)
    {

        // Recuperar e pesquisar os registros do banco dados
        $clientes = Cliente::when($request->has('name'), function ($whenQuery) use ($request) {
            $whenQuery->where('name', 'like', '%' . $request->name . '%');
        })
            ->orderBy('created_at')
            ->get();

        // Criar o arquivo temporário
        $csvNomeArquivo = tempnam(sys_get_temp_dir(), 'csv_' . Str::ulid());

        // Abrir o arquivo na forma de escrita
        $arquivoAberto = fopen($csvNomeArquivo, 'w');

        // Criar o cabeçalho do Excel - Usar a função mb_convert_encoding para converter carateres especiais
        $cabecalho = ['id', mb_convert_encoding('Nome', 'ISO-8859-1', 'UTF-8'), mb_convert_encoding('Sobrenome', 'ISO-8859-1', 'UTF-8'), 'E-mail','Criado'];

        // Escrever o cabeçalho no arquivo
        fputcsv($arquivoAberto, $cabecalho, ';');

        // Ler os registros recuperados do banco de dados
        foreach ($clientes as $cliente) {

            // Criar o array com os dados da linha do Excel
            $clienteArray = [
                'id' => $cliente->id,
                'nome' => mb_convert_encoding($cliente->name, 'ISO-8859-1', 'UTF-8'),
                'sobrenome' => mb_convert_encoding($cliente->last_name, 'ISO-8859-1', 'UTF-8'),
                'email' => $cliente->email,
                'criado' => $cliente->created_at
            ];

            // Escrever o conteúdo no arquivo
            fputcsv($arquivoAberto, $clienteArray, ';');
        }

        // Criar o rodapé do Excel
        $rodape = ['', '', '', '', ''];

        // Escrever o conteúdo no arquivo
        fputcsv($arquivoAberto, $rodape, ';');

        // Fechar o arquivo após a escrita
        fclose($arquivoAberto);

        // Realizar o download do arquivo
        return response()->download($csvNomeArquivo, 'relatorio_gestor_clientes_' . Str::ulid() . '.csv');
    }

    // Gerar Word
    public function gerarWord(Request $request)
    {

        // Recuperar e pesquisar os registros do banco dados
        $clientes = Cliente::when($request->has('name'), function ($whenQuery) use ($request) {
            $whenQuery->where('name', 'like', '%' . $request->name . '%');
        })
            ->orderBy('created_at')
            ->get();

        // Criar uma instância do PhpWord
        $phpWord = new PhpWord();

        // Adicionar conteúdo ao documento
        $section = $phpWord->addSection();

        // Adicionar uma tabela
        $table = $section->addTable();

        // Definir as configurações de borda
        $borderStyle = [
            'borderColor' => '000000',
            'borderSize' => 6,
        ];

        // Adicionar o cabeçalho da tabela
        $table->addRow();
        $table->addCell(2000, $borderStyle)->addText("id");
        $table->addCell(2000, $borderStyle)->addText("Nome");
        $table->addCell(2000, $borderStyle)->addText("Sobrenome");
        $table->addCell(2000, $borderStyle)->addText("E-mail");
        $table->addCell(2000, $borderStyle)->addText("Criado");

        // Ler os registros recuperados do banco de dados
        foreach ($clientes as $cliente) {

            // Adicionar a linha da tabela
            $table->addRow();
            $table->addCell(2000, $borderStyle)->addText($cliente->id);
            $table->addCell(2000, $borderStyle)->addText($cliente->name);
            $table->addCell(2000, $borderStyle)->addText($cliente->last_name);
            $table->addCell(2000, $borderStyle)->addText($cliente->email);
            $table->addCell(2000, $borderStyle)->addText(Carbon::parse($cliente->created_at)->format('d/m/Y'));
        }

        // Adicionar o total na tabela
        $table->addRow();
        $table->addCell(2000)->addText('');
        $table->addCell(2000)->addText('');
        $table->addCell(2000)->addText('');
        $table->addCell(2000)->addText('');
        $table->addCell(2000)->addText('');

        // Criar o nome do arquivo
        $filename = 'relatorio_gestor_clientes.docx';

        // Obter o caminho completo onde o arquivo gerado pelo PhpWord será salvo
        $savePath = storage_path($filename);

        // Salvar o arquivo
        $phpWord->save($savePath);

        // Forçar o download do arquivo no caminho indicado, após o download remover
        return response()->download($savePath)->deleteFileAfterSend(true);
    }

}
