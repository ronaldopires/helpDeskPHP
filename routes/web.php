<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RequestController;

Route::get('/', [RequestController::class, 'index']);
Route::get('/novo-chamado', [RequestController::class, 'create']);
Route::post('/novo-chamado', [RequestController::class, 'store']);
Route::get('/chamados', [RequestController::class, 'requests']);
Route::get('/chamado/{id}', [RequestController::class, 'show']);
// Route::post('/chamado/{id}', [RequestController::class, 'store']);
Route::get('/meus-chamados', [RequestController::class, 'myRequests']);
Route::get('/meu-perfil', [RequestController::class, 'profile']);
Route::get('/ajuda', [RequestController::class, 'help']);
Route::get('/cadastro', [RequestController::class, 'register']);
Route::get('/login', [RequestController::class, 'login']);
Route::get('/configuracoes', [RequestController::class, 'config']);
