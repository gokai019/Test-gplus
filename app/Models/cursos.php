<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class cursos extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome'
    ];

    public function alunos()
    {
        return $this->belongsToMany(Alunos::class, 'auxAluno', 'idCurso', 'idAluno');
    }
    public function avaliacoes(): MorphMany
    {
        return $this->MorphMany(Avaliacoes::class, 'avaliable');
    }
}
