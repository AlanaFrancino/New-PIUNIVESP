<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    use HasFactory;

    protected $table = 'genero';

    protected $fillable = [
        'descricao'
    ];

    /**
     * Relacinamento de tabelas
     */
    #region Relacionamento Tabelas
    public function livro()
    {
        return $this->hasMany(Livro::class);
    }
    #endregion
}
