<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Limite extends Model
{
    use HasFactory;

    // Indicar o nome da tabela
    protected $table = 'limites';

    // Indicar quais colunas podem ser cadastrada
    protected $fillable = ['valor','user_id','cliente_id'];
}
