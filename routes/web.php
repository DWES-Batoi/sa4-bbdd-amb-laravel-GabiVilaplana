<?php

use App\Http\Controllers\JugadoraController;
use App\Http\Controllers\PartitController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EquipController;
use App\Http\Controllers\EstadiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClassificacioController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

// --- Rutas Públicas de Inicio ---
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// --- Clasificación (Tiempo Real) ---
// La ponemos aquí para que sea pública
Route::get('/classificacio', [ClassificacioController::class, 'index'])->name('classificacio.index');

// --- Autenticación Google ---
Route::get('/auth/google/redirect', [AuthController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback'])->name('google.callback');

// --- Idioma (i18n) ---
Route::get('/locale/{locale}', function (string $locale) {
    $available = ['ca', 'es', 'en'];
    if (!in_array($locale, $available, true)) {
        $locale = config('app.fallback_locale', 'en');
    }
    Session::put('locale', $locale);
    return redirect()->back();
})->name('setLocale');

// --- Vistas de Lectura (Públicas) ---
Route::resource('equips', EquipController::class)->only(['index', 'show']);
Route::resource('estadis', EstadiController::class)->only(['index', 'show']);
Route::resource('jugadoras', JugadoraController::class)->only(['index', 'show']);
Route::resource('partits', PartitController::class)->only(['index', 'show']);

// --- Rutas Protegidas (Requieren Login) ---
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // --- Rutas de Escritura (Protegidas también contra el ROL CONVIDAT) ---
    Route::middleware(['not.convidat'])->group(function () {
        Route::resource('equips', EquipController::class)->except(['index', 'show']);
        Route::resource('estadis', EstadiController::class)->except(['index', 'show']);
        Route::resource('jugadoras', JugadoraController::class)->except(['index', 'show']);
        Route::resource('partits', PartitController::class)->except(['index', 'show']);
    });
});

require __DIR__.'/auth.php';