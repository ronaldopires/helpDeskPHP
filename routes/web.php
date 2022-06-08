<?php
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');

use App\Http\Controllers\DepartmentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use App\Models\Department;

Route::get('/', [TicketController::class, 'index']);

//Tickets
Route::get('/novo-chamado', [TicketController::class, 'create'])->middleware('auth');
Route::post('/novo-chamado', [TicketController::class, 'store'])->middleware('auth');

Route::get('/chamados', [TicketController::class, 'requests']);
Route::get('/meus-chamados', [TicketController::class, 'myRequests'])->middleware('auth');
Route::get('/chamado/{id}', [TicketController::class, 'show']);
Route::put('/chamado/editar/{id}', [TicketController::class, 'update'])->middleware('auth');

//Department
Route::get('/departamentos', [DepartmentController::class, 'show'])->middleware('auth');
Route::post('/departamentos', [DepartmentController::class, 'store'])->middleware('auth');
Route::get('/departamento/editar/{id}', [DepartmentController::class, 'edit'])->middleware('auth');
Route::put('/departamento/editar/{id}', [DepartmentController::class, 'update'])->middleware('auth');
Route::delete('/departamento/excluir/{id}', [DepartmentController::class, 'destroy'])->middleware('auth');

Route::get('/ajuda', [TicketController::class, 'help']);
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('layouts.dashboard');
    })->name('dashboard');
});
