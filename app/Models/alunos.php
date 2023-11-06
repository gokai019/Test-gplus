<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class alunos extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'data_nascimento',
        'cpf',
    ];

    public function cursos()
    {
        // return $this->belongsToMany(Cursos::class)->withPivot('idCurso');
        return $this->belongsToMany(Cursos::class, 'auxAluno', 'idAluno', 'idCurso');
    }

    public function avaliacoes(): MorphMany
    {
        return $this->MorphMany(Avaliacoes::class, 'avaliable');
    }
}
