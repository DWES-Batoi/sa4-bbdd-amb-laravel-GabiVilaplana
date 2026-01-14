<?php

namespace App\Http\Controllers;

use App\Models\Jugadora;
use App\Models\Equip;
use App\Models\Estadi;
use App\Services\JugadoraService;
use Illuminate\Http\Request;

class JugadoraController extends Controller
{
    protected $jugadoraService;

    public function __construct(JugadoraService $jugadoraService)
    {
        $this->jugadoraService = $jugadoraService;
    }

    public function index()
    {
        $jugadoras = $this->jugadoraService->getAll();
        return view('jugadoras.index', compact('jugadoras'));
    }

    public function create()
    {
        $equips = Equip::all();   // En catalán, como el modelo
        $estadis = Estadi::all(); // Opcional: solo si decides mantener estadi_id (no recomendado)
        return view('jugadoras.create', compact('equips', 'estadis'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'cognom' => 'required|string|max:255',
            'numero' => 'nullable|integer|min:1',
            'posicio' => 'nullable|string|max:100',
            'equip_id' => 'required|exists:equips,id',
            // 'estadi_id' se elimina → no está en el modelo corregido
        ]);

        $this->jugadoraService->create($validated);

        return redirect()->route('jugadoras.index')
                         ->with('success', 'Jugadora creada correctament.');
    }

    public function show(Jugadora $jugadora)
    {
        return view('jugadoras.show', compact('jugadora'));
    }

    public function edit(Jugadora $jugadora)
    {
        $equips = Equip::all();
        // $estadis = Estadi::all(); ← solo si lo usas (mejor omitirlo)
        return view('jugadoras.edit', compact('jugadora', 'equips'));
    }

    public function update(Request $request, Jugadora $jugadora)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'cognom' => 'required|string|max:255',
            'numero' => 'nullable|integer|min:1',
            'posicio' => 'nullable|string|max:100',
            'equip_id' => 'required|exists:equips,id',
            // 'estadi_id' eliminado
        ]);

        $this->jugadoraService->update($jugadora, $validated);

        return redirect()->route('jugadoras.index')
                         ->with('success', 'Jugadora actualitzada correctament.');
    }

    public function destroy(Jugadora $jugadora)
    {
        $this->jugadoraService->delete($jugadora);

        return redirect()->route('jugadoras.index')
                         ->with('success', 'Jugadora eliminada correctament.');
    }
}