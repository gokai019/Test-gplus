<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    public function avaliacoes()
    {
        return $this->hasMany(Avaliacoes::class, 'idCursos');
    }
}
