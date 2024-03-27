<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Conta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(!Categoria::where('descricao', 'Crédito')->first()){
            Categoria::create([
                'descricao' => 'Crédito',
            ]);
        }
        if(!Categoria::where('descricao', 'Empréstimo')->first()){
            Categoria::create([
                'descricao' => 'Empréstimo',
            ]);
        }
        if(!Categoria::where('descricao', 'Condomínio')->first()){
            Categoria::create([
                'descricao' => 'Condomínio',
            ]);
        }
        if(!Categoria::where('descricao', 'Financiamento')->first()){
            Categoria::create([
                'descricao' => 'Financiamento',
            ]);
        }
        if(!Categoria::where('descricao', 'Veiculo')->first()){
            Categoria::create([
                'descricao' => 'Veiculo',
            ]);
        }
        if(!Categoria::where('descricao', 'Moradia')->first()){
            Categoria::create([
                'descricao' => 'Moradia',
            ]);
        }
        if(!Categoria::where('descricao', 'Lazer')->first()){
            Categoria::create([
                'descricao' => 'Lazer',
            ]);
        }
        if(!Categoria::where('descricao', 'Saúde')->first()){
            Categoria::create([
                'descricao' => 'Saúde',
            ]);
        }
    }
}
