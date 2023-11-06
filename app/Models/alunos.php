<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function avaliacoes()
    {
        return $this->hasMany(Avaliacoes::class, 'idAluno');
    }
}
