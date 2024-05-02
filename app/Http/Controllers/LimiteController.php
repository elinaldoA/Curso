<?php

namespace App\Http\Controllers;

use App\Http\Requests\LimiteRequest;
use App\Models\Limite;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class LimiteController extends Controller
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
        // Recuperar os registros do banco dados
        // Carregar a VIEW
        $limites = DB::table('limites')->get();
        return view('limites.index', ['limites' => $limites]);
    }

    // Detalhes da conta
    public function show(Limite $limite)
    {

        // Carregar a VIEW
        return view('limites.show', ['limite' => $limite]);
    }

    // Carregar o formulário cadastrar nova conta
    public function create()
    {
        // Carregar a VIEW
        return view('limites.create');
    }

    // Cadastrar no banco de dados nova conta
    public function store(LimiteRequest $request)
    {

        // Validar o formulário
        $request->validated();

        try {
            // Cadastrar no banco de dados na tabela limites os valores de todos os campos
            $limite = Limite::create([
                'valor' => str_replace(',', '.', str_replace('.', '', $request->valor)),
                'user_id' => $request->user_id,
            ]);

            // Redirecionar o usuário, enviar a mensagem de sucesso
            return redirect()->route('limite.show', ['limite' => $limite->id])->with('success', 'Limite cadastrada com sucesso');
        } catch (Exception $e) {

            // Salvar log
            Log::warning('Limite não cadastrado', ['error' => $e->getMessage()]);

            // Redirecionar o usuário, enviar a mensagem de erro
            return back()->withInput()->with('error', 'Limite não cadastrado!');
        }
    }

    // Carregar o formulário editar a limite
    public function edit(Limite $limite)
    {
        // Carregar a VIEW
        return view('limites.edit', ['limite' => $limite]);
    }

    // Editar no banco de dados a limite
    public function update(LimiteRequest $request, Limite $limite)
    {
        // Validar o formulário
        $request->validated();

        try {

            // Editar as informações do registro no banco de dados
            $limite->update([
                'valor' => str_replace(',', '.', str_replace('.', '', $request->valor)),
                'user_id' => $request->user_id,
            ]);

            // Salvar log
            Log::info('Limite editado com sucesso', ['id' => $limite->id, 'limite' => $limite]);

            // Redirecionar o usuário, enviar a mensagem de sucesso
            return redirect()->route('limite.show', ['limite' => $limite->id])->with('success', 'Limite editado com sucesso');
        } catch (Exception $e) {

            // Salvar log
            Log::warning('Limite não editado', ['error' => $e->getMessage()]);

            // Redirecionar o usuário, enviar a mensagem de erro
            return back()->withInput()->with('error', 'Limite não editado!');
        }
    }

    // Excluir a limite do banco de dados
    public function destroy(Limite $limite)
    {

        // Excluir o registro do banco de dados
        $limite->delete();

        // Redirecionar o usuário, enviar a mensagem de sucesso
        return redirect()->route('limite.index')->with('success', 'Limite apagado com sucesso');
    }

}
