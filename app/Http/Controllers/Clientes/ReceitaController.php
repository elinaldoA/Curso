<?php

namespace App\Http\Controllers\Clientes;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReceitaRequest;
use App\Models\Receita;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ReceitaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:cliente');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Recuperar os registros do banco dados
        $receitas = Receita::when($request->has('nome'), function ($whenQuery) use ($request) {
            $whenQuery->where('nome', 'like', '%' . $request->nome . '%');
        })
            ->when($request->filled('data_inicio'), function ($whenQuery) use ($request) {
                $whenQuery->where('created_at', '>=', \Carbon\Carbon::parse($request->data_inicio)->format('Y-m-d'));
            })
            ->when($request->filled('data_fim'), function ($whenQuery) use ($request) {
                $whenQuery->where('updated_at', '<=', \Carbon\Carbon::parse($request->data_fim)->format('Y-m-d'));
            })
            ->orderByDesc('id')
            ->paginate(10)
            ->withQueryString();

        // Carregar a VIEW
        return view('cliente.receitas.index', [
            'receitas' => $receitas,
            'nome' => $request->nome,
            'data_inicio' => $request->data_inicio,
            'data_fim' => $request->data_fim,
        ]);
    }

    // Detalhes da conta
    public function show(Receita $receita)
    {

        // Carregar a VIEW
        return view('cliente.receitas.show', ['receita' => $receita]);
    }

    // Carregar o formulário cadastrar nova conta
    public function create()
    {
        // Carregar a VIEW
        return view('cliente.receitas.create');
    }

    // Cadastrar no banco de dados nova conta
    public function store(ReceitaRequest $request)
    {

        // Validar o formulário
        $request->validated();

        try {
            // Cadastrar no banco de dados na tabela receitas os valores de todos os campos
            $receita = Receita::create([
                'nome' => $request->nome,
                'valor' => str_replace(',', '.', str_replace('.', '', $request->valor)),
                'user_id' => $request->user_id,
            ]);

            // Redirecionar o usuário, enviar a mensagem de sucesso
            return redirect()->route('cliente.receita.show', ['receita' => $receita->id])->with('success', 'Receita cadastrada com sucesso');
        } catch (Exception $e) {

            // Salvar log
            Log::warning('Receita não cadastrada', ['error' => $e->getMessage()]);

            // Redirecionar o usuário, enviar a mensagem de erro
            return back()->withInput()->with('error', 'Receita não cadastrada!');
        }
    }

    // Carregar o formulário editar a receita
    public function edit(Receita $receita)
    {
        // Carregar a VIEW
        return view('cliente.receitas.edit');
    }

    // Editar no banco de dados a receita
    public function update(ReceitaRequest $request, Receita $receita)
    {
        // Validar o formulário
        $request->validated();

        try {

            // Editar as informações do registro no banco de dados
            $receita->update([
                'nome' => $request->nome,
                'valor' => str_replace(',', '.', str_replace('.', '', $request->valor)),
                'user_id' => $request->user_id,
            ]);

            // Salvar log
            Log::info('Receita editada com sucesso', ['id' => $receita->id, 'receita' => $receita]);

            // Redirecionar o usuário, enviar a mensagem de sucesso
            return redirect()->route('cliente.receita.show', ['receita' => $receita->id])->with('success', 'Receita editada com sucesso');
        } catch (Exception $e) {

            // Salvar log
            Log::warning('Receita não editada', ['error' => $e->getMessage()]);

            // Redirecionar o usuário, enviar a mensagem de erro
            return back()->withInput()->with('error', 'Receita não editada!');
        }
    }

    // Excluir a receita do banco de dados
    public function destroy(Receita $receita)
    {

        // Excluir o registro do banco de dados
        $receita->delete();

        // Redirecionar o usuário, enviar a mensagem de sucesso
        return redirect()->route('cliente.receita.index')->with('success', 'Receita apagada com sucesso');
    }
}
