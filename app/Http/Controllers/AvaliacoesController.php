<?php

namespace App\Http\Controllers;

use App\Models\alunos;
use App\Models\avaliacoes;
use Illuminate\Http\Request;

class AvaliacoesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $avaliacoes = Avaliacoes::all();
        return response()->json(['avaliacoes' => $avaliacoes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        $alunos = Alunos::find($id);

        try {
            $request->validate([
                'disciplina' => 'required',
                'nota' => 'required|numeric',
            ]);

            $avaliacoes = Avaliacoes::create([
                'disciplina' => $request->disciplina,
                'nota' => $request->nota,
                'avaliable_id' => $alunos->id,
                'avaliable_type' => Alunos::class,
            ]);

            return response()->json(['message' => 'Avaliação criada com sucesso', 'avaliacao' => $avaliacoes], 201);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
            ;
        }


    }

    /**
     * Display the specified resource.
     */
    public function show(avaliacoes $avaliacoes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(avaliacoes $avaliacoes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, avaliacoes $avaliacoes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(avaliacoes $avaliacoes)
    {
        //
    }
}
