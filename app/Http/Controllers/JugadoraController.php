<?php

namespace App\Http\Controllers;

use App\Models\Jugadora;
use App\Models\Equip;
use App\Models\Estadi;
use App\Services\JugadoraService;
use Illuminate\Http\Request;
use App\Http\Requests\JugadoraRequest; // Asegúrate de importar tu Request
use App\Http\Controllers\Controller;

class JugadoraController extends Controller
{
    protected $jugadoraService;

    public function __construct(JugadoraService $jugadoraService)
    {
        $this->jugadoraService = $jugadoraService;
    }

    // CORREGIDO: Ahora devuelve la vista index.blade.php
    public function index()
    {
        $jugadoras = Jugadora::all(); 
        return view('jugadoras.index', compact('jugadoras'));
    }

    public function create()
    {
        $equips = Equip::all();
        $estadis = Estadi::all();
        return view('jugadoras.create', compact('equips', 'estadis'));
    }

    // CORREGIDO: Redirige tras guardar en lugar de soltar JSON
    public function store(JugadoraRequest $request)
    {
        Jugadora::create($request->validated());

        return redirect()->route('jugadoras.index')
                         ->with('success', 'Jugadora creada correctamente');
    }

    // CORREGIDO: Ahora devuelve la vista show.blade.php
    public function show(Jugadora $jugadora)
    {
        return view('jugadoras.show', compact('jugadora'));
    }

    public function edit(Jugadora $jugadora)
    {
        $equips = Equip::all();
        return view('jugadoras.edit', compact('jugadora', 'equips'));
    }

    // CORREGIDO: Redirige tras actualizar
    public function update(JugadoraRequest $request, Jugadora $jugadora)
    {
        $jugadora->update($request->validated());

        return redirect()->route('jugadoras.index')
                         ->with('success', 'Jugadora actualizada');
    }

    // CORREGIDO: Redirige tras eliminar
    public function destroy(Jugadora $jugadora)
    {
        $jugadora->delete();

        return redirect()->route('jugadoras.index')
                         ->with('success', 'Jugadora eliminada');
    }
}