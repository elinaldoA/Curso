<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $receitas = DB::table('receitas')->get();
        $limites = DB::table('limites')->get();
        $contas = DB::table('contas')->get();
        $categorias = DB::table('categorias')->get();

        return view('home', compact('receitas','limites','contas','categorias'));
    }
}
