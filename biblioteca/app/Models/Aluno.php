<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use HasFactory;

    protected $table = 'alunos';

    protected $fillable = [
        'nome',
        'ra',
        'email',
        'user_id'
    ];

    /**
     * Relacinamento de tabelas
     */
    #region Relacionamento Tabelas
    public function usuario(){
        return $this->belongsTo(User::class);
    }
    public function emprestimo()
    {
        return $this->hasMany(Emprestimo::class);
    }
    #endregion
}
