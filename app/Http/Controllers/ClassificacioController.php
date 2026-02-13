<?php

namespace App\Http\Controllers;

use App\Models\Equip;
use App\Services\ClassificacioService;
use Illuminate\Http\Request;

class ClassificacioController extends Controller
{
    public function index(ClassificacioService $classificacioService)
    {
        // Obtenemos las posiciones actuales calculadas por el servicio
        $posicions = $classificacioService->posicionsPerEquip(); // [equip_id => pos]

        // Obtenemos los equipos ordenados por su posición en la clasificación
        $equips = Equip::all()
            ->sortBy(fn ($e) => $posicions[$e->id] ?? 999)
            ->values();

        return view('classificacio.index', compact('equips', 'posicions'));
    }
}