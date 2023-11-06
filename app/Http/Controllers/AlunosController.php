<?php

namespace App\Http\Controllers;

use App\Models\alunos;
use App\Models\cursos;
use Illuminate\Http\Request;

class AlunosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alunos = Alunos::all();
        return response()->json(['alunos' => $alunos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }



    public function store(Request $request)
    {
        try {
            $request->validate([
                'nome' => 'required',
                'data_nascimento' => 'required|date',
                'cpf' => 'required|unique:alunos',
            ]);

            $alunos = Alunos::create($request->all());

            return response()->json(['message' => 'Aluno criado com sucesso', 'aluno' => $alunos], 201);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);;
        };
    }

    public function show(alunos $alunos, $id)
    {
        $alunos = Alunos::with('cursos', 'avaliacoes')->find($id);

        if (!$alunos) {
            return response()->json(['message' => 'Aluno não encontrado'], 404);
        }

        try {
            $cursos = $alunos->cursos;
            $avaliacoes = $alunos->avaliacoes;

            $mediasPorDisciplina = [];

            foreach ($avaliacoes as $avaliacao) {
                $disciplina = $avaliacao->disciplina;
                $nota = $avaliacao->nota;

                if (!isset($mediasPorDisciplina[$disciplina])) {
                    $mediasPorDisciplina[$disciplina] = [
                        'totalNotas' => $nota,
                        'quantidadeAvaliacoes' => 1,
                    ];
                } else {
                    $mediasPorDisciplina[$disciplina]['totalNotas'] += $nota;
                    $mediasPorDisciplina[$disciplina]['quantidadeAvaliacoes'] += 1;
                }
            }

            foreach ($mediasPorDisciplina as $disciplina => $dados) {
                $media = $dados['totalNotas'] / $dados['quantidadeAvaliacoes'];
                $mediasPorDisciplina[$disciplina]['media'] = $media;
            }

            return response()->json([
                'aluno' => $alunos,
                'cursos' => $cursos,
                'avaliacoes' => $avaliacoes,
                'medias_por_disciplina' => $mediasPorDisciplina,
            ]);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Erro ao recuperar dados do aluno' . $th->getMessage()], 500);
        }
    }

    public function inscreverCurso(Request $request)
    {
        try {

            $idAluno = $request->input('idAluno');
            $idCurso = $request->input('idCurso');

            $alunos = Alunos::find($idAluno);
            $cursos = Cursos::find($idCurso);

            if ($alunos && $cursos) {

                $alunos->cursos()->attach($cursos);

                return response()->json(['message' => 'Aluno inscrito com sucesso no curso']);
            } else {
                return response()->json(['message' => 'Aluno ou curso não encontrado'], 404);
            }
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Erro ao inscrever o aluno no curso' . $th->getMessage()], 500);
        }
    }

    public function edit(alunos $alunos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, alunos $alunos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(alunos $alunos)
    {
        //
    }
}
