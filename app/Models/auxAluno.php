<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class auxAluno extends Model
{
    use HasFactory;

    public function alunos()
    {
        return $this->belongsTo(Alunos::class);
    }
    public function cursos()
    {
        return $this->belongsTo(Cursos::class);
    }
    public function avaliacoes(): MorphMany
    {
        return $this->MorphMany(Avaliacoes::class, 'avaliable');
    }
}
