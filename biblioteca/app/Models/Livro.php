<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;

    protected $table = 'livros';

    protected $fillable = [
        'titulo',
        'genero_id',
        'quantidade',
        'patrimonio',
        'doacao',
        'prateleira',
        'prat_local',
        'ativo'
    ];

    /**
     * Relacinamento de tabelas
     */
    #region Relacionamento Tabelas
    public function genero(){
        return $this->belongsTo(Genero::class);
    }

    public function prateleira(){
        return $this->belongsTo(Prateleira::class);
    }
    #endregion
}
