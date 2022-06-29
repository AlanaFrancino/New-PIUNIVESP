<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emprestimo extends Model
{
    use HasFactory;

    protected $table = 'emprestimos';

    protected $fillable = [
        'livro_id',
        'aluno_id',
        'funcionario_id',
        'dt_prevdev',
        'dt_dev',
        'qnt',
        'status',
        'user_cadastro'
    ];

    /**
     * Relacinamento de tabelas
     */
    #region Relacionamento Tabelas
    public function usuario(){
        return $this->belongsTo(User::class,"user_cadastro");
    }
    public function aluno(){
        return $this->belongsTo(Aluno::class);
    }
    public function funcionario(){
        return $this->belongsTo(Funcionario::class);
    }
    public function livro(){
        return $this->belongsTo(Livro::class,"livro_id");
    }
    #endregion
}
