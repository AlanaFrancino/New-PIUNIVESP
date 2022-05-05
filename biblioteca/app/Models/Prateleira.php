<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prateleira extends Model
{
    use HasFactory;
    protected $table = 'prateleiras';

    protected $fillable = [
        'rua',
        'altura',
        'largura',
        'descricao',
        'user_cadastro',
        'ativo'
    ];

    /**
     * Relacinamento de tabelas
     */
    #region Relacionamento Tabelas
    public function livro()
    {
        return $this->hasMany(Livro::class,"prateleira","id");
    }

    public function usuario(){
        return $this->belongsTo(User::class,"user_cadastro");
    }
    #endregion
}
