<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

     // Indicar o nome da tabela
     protected $table = 'categorias';

    protected $fillable = [
        'nome'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
    public function conta()
    {
        return $this->hasMany(Conta::class);
    }
}
