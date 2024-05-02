<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receita extends Model
{
    use HasFactory;

    // Indicar o nome da tabela
    protected $table = 'receitas';

    // Indicar quais colunas podem ser cadastrada
    protected $fillable = ['nome', 'valor','user_id','cliente_id'];
}
