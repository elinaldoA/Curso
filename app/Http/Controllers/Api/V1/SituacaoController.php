<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\SituacaoContasRequest;
use App\Models\SituacaoConta;
use Illuminate\Http\Request;

class SituacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $situacao_contas = SituacaoConta::all();
        return response()->json($situacao_contas);
    }
}
