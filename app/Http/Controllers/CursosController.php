<?php

namespace App\Http\Controllers;

use App\Models\cursos;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class CursosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cursos = Cursos::all();
        return response()->json(['cursos' => $cursos]);
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
    public function store(Request $request)
    {
        try {
            $request->validate([
                'nome' => 'required'
            ]);

            $cursos = Cursos::create($request->all());

            return response()->json(['message' => 'Curso criado com sucesso', 'curso' => $cursos], 201);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Não foi possivel criar uma curso'], 500);;
        };
    }

    /**
     * Display the specified resource.
     */
    public function show(cursos $cursos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(cursos $cursos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, cursos $cursos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(cursos $cursos)
    {
        //
    }
}
