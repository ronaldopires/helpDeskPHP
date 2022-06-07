<?php
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');

use App\Http\Controllers\DepartmentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RequestController;
use App\Models\Department;

Route::get('/', [RequestController::class, 'index']);
//Requests
Route::get('/novo-chamado', [RequestController::class, 'create'])->middleware('auth');
Route::get('/chamados', [RequestController::class, 'requests']);
Route::get('/chamado/{id}', [RequestController::class, 'show']);
Route::get('/add-request/{id}', [RequestController::class, 'addRequest'])->middleware('auth');
Route::get('/meus-chamados', [RequestController::class, 'myRequests'])->middleware('auth');
Route::post('/novo-chamado', [RequestController::class, 'store'])->middleware('auth');
Route::put('/chamado/update/{id}', [RequestController::class, 'update'])->middleware('auth');

//Department
Route::get('/departamentos', [DepartmentController::class, 'show'])->middleware('auth');
Route::post('/departamentos', [DepartmentController::class, 'store'])->middleware('auth');
Route::get('/departamento/editar/{id}', [DepartmentController::class, 'edit'])->middleware('auth');
Route::put('/departamento/editar/{id}', [DepartmentController::class, 'update'])->middleware('auth');
Route::delete('/departamento/excluir/{id}', [DepartmentController::class, 'destroy'])->middleware('auth');



Route::get('/meu-perfil', [RequestController::class, 'profile'])->middleware('auth');
Route::get('/ajuda', [RequestController::class, 'help']);
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('layouts.dashboard');
    })->name('dashboard');
});