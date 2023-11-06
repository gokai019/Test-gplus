<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class avaliacoes extends Model
{
    use HasFactory;

    protected $fillable = [
        'idAluno',
        'idCurso',
        'disciplina',
        'nota'
    ];

    public function alunos()
    {
        return $this->belongsTo(Alunos::class);
    }
    public function cursos()
    {
        return $this->belongsTo(Cursos::class);
    }
}
