<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\JugadoraController;
use App\Http\Controllers\Api\EquipController;
use App\Http\Controllers\Api\AuthController;

// --- Autenticación ---
Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

// --- Rutas Protegidas (Requieren Token Sanctum) ---
Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);

    // Endpoints de escritura (POST, PUT, DELETE) para Jugadoras
    Route::apiResource('jugadores', JugadoraController::class)
        ->parameters(['jugadores' => 'jugadora'])
        ->except(['index', 'show'])
        ->names('api.jugadores'); // Renombrado para evitar conflicto con Web

    // Endpoints de escritura (POST, PUT, DELETE) para Equips
    Route::apiResource('equips', EquipController::class)
        ->except(['index', 'show'])
        ->names('api.equips'); // Renombrado para evitar conflicto con Web
});

// --- Endpoints Públicos (Lectura: GET) ---

// API Jugadoras (GET index y show)
Route::apiResource('jugadores', JugadoraController::class)
    ->parameters(['jugadores' => 'jugadora'])
    ->only(['index', 'show'])
    ->names('api.jugadores');

// API Equips (GET index y show)
Route::apiResource('equips', EquipController::class)
    ->only(['index', 'show'])
    ->names('api.equips');

// Ruta de usuario (Opcional)
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');