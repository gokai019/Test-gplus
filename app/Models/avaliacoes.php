<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class avaliacoes extends Model
{
    use HasFactory;

    protected $fillable = [
        'disciplina',
        'nota',
        'avaliable_id',
        'avaliable_type'

    ];

    public function avaliable()
    {
        return $this->morphTo();
    }
}
