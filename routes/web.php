<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RequestController;

Route::get('/', [RequestController::class, 'index']);
Route::get('/novo-chamado', [RequestController::class, 'newRequest']);
Route::get('/chamados', [RequestController::class, 'requests']);
Route::get('/meus-chamados', [RequestController::class, 'myRequests']);
Route::get('/meu-perfil', [RequestController::class, 'profile']);
Route::get('/ajuda', [RequestController::class, 'help']);
Route::get('/cadastro', [RequestController::class, 'register']);
Route::get('/login', [RequestController::class, 'login']);