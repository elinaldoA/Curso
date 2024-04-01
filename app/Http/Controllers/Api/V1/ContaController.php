<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContaRequest;
use App\Models\Conta;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ContaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contas = Conta::all();
        return response()->json($contas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContaRequest $request)
    {
        try {
            $conta = new Conta;
            $conta->nome = $request->nome;
            $conta->nome = $request->valor;
            $conta->nome = $request->vencimento;
            $conta->nome = $request->situacao_conta_id;
            $conta->nome = $request->categoria_id;
            $conta->nome = $request->user_id;
            $conta->save();

            return response()->json([
                "message" => "Conta criada com sucesso",
            ], 201);

        } catch (Exception $e) {
            return response()->json([
                // Salvar log
                Log::warning('Houver um erro ao incluir uma nova conta ', ['error' => $e->getMessage()])

            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $conta = Conta::find($id);
        if (!empty($conta)) {
            return response()->json($conta);
        } else {
            return response()->json([
                "message" => "Conta não encontrada!",
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
            if(Conta::where('id', $id)->exists()){
                $conta = conta::find($id);
                $conta->nome = is_null($request->nome) ? $conta->nome : $request->nome;
                $conta->valor = is_null($request->valor) ? $conta->valor : $request->valor;
                $conta->vencimento = is_null($request->vencimento) ? $conta->vencimento : $request->vencimento;
                $conta->situacao_conta_id = is_null($request->situacao_categoria_id) ? $conta->situacao_conta_id : $request->situacao_conta_id;
                $conta->categoria_id = is_null($request->categoria_id) ? $conta->categoria_id : $request->categoria_id;
                $conta->user_id = is_null($request->user_id) ? $conta->user_id : $request->user_id;
                $conta->save();
                return response()->json([
                    "message" => "Conta atualizada com sucesso!"
                ], 200);
            }
        }catch(Exception $e){
            return response()->json([
                // Salvar log
                Log::warning('Houver um erro ao atualizada a conta ', ['error' => $e->getMessage()])

            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            if(Conta::where('id', $id)->exists()){
                $conta = conta::find($id);
                $conta->delete();
                return response()->json([
                    "message" => "Conta deletada com sucesso!"
                ], 202);
            }
        }catch(Exception $e){
            return response()->json([
                "message" => "Conta não encontrada!"
            ], 404);
        }
    }
}
