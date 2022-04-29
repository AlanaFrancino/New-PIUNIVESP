<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use HasFactory;

    protected $table = 'funcionarios';

    protected $fillable = [
        'nome',
        'cargo',
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
