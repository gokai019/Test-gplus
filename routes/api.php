<?php

use App\Http\Controllers\AlunosController;
use App\Http\Controllers\AvaliacoesController;
use App\Http\Controllers\CursosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/alunos/novo', [AlunosController::class, 'store'])->name('registroAluno');
Route::post('/alunos/inscrever',  [AlunosController::class, 'inscreverCurso']);
Route::get('/alunos/{id}',  [AlunosController::class, 'show']);
Route::get('/alunos',  [AlunosController::class, 'index']);

Route::post('/cursos/novo', [CursosController::class, 'store'])->name('registroCurso');
Route::post('/avaliacoes/novo', [AvaliacoesController::class, 'store'])->name('registroAvaliacao');
