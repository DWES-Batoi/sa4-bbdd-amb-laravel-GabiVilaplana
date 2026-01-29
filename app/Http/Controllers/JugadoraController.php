<?php

namespace App\Http\Controllers;

use App\Models\Jugadora;
use App\Models\Equip;
use App\Models\Estadi;
use App\Services\JugadoraService;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;


class JugadoraController extends Controller
{
    protected $jugadoraService;

    public function __construct(JugadoraService $jugadoraService)
    {
        $this->jugadoraService = $jugadoraService;
    }

    public function index()
    {
        return Jugadora::query()->get(); // JSON automàtic
    }

    public function create()
    {
        $equips = Equip::all();   // En catalán, como el modelo
        $estadis = Estadi::all(); // Opcional: solo si decides mantener estadi_id (no recomendado)
        return view('jugadoras.create', compact('equips', 'estadis'));
    }

        public function store(JugadoraRequest $request)
    {
        $jugadora = Jugadora::create($request->validated());

        return response()->json($jugadora, 201);
    }


    public function show(Jugadora $jugadora)
    {
        return $jugadora; // JSON automàtic (Route Model Binding)
    }

    public function edit(Jugadora $jugadora)
    {
        $equips = Equip::all();
        // $estadis = Estadi::all(); ← solo si lo usas (mejor omitirlo)
        return view('jugadoras.edit', compact('jugadora', 'equips'));
    }

    public function update(JugadoraRequest $request, Jugadora $jugadora)
{
    $jugadora->update($request->validated());

    return response()->json($jugadora, 200);
}

    public function destroy(Jugadora $jugadora)
{
    $jugadora->delete();

    return response()->noContent(); // 204
}
}