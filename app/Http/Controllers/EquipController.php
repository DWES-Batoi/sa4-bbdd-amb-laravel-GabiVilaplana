<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEquipRequest;
use App\Http\Requests\UpdateEquipRequest;
use App\Services\EquipService;
use App\Models\Estadi;
use App\Models\Equip;

class EquipController extends Controller
{
    public function __construct(private EquipService $servei) {}

    public function index() {
        $equips = $this->servei->llistar();
        
        // Si devuelves solo $equips, verás el JSON de la imagen.
        // DEBES devolver la vista:
        return view('equips.index', compact('equips'));
    }

    public function create() {
        $estadis = Estadi::all();
        return view('equips.create', compact('estadis'));
    }

    public function store(StoreEquipRequest $request)
    {
        $this->servei->guardar($request->validated(), $request->file('escut'));
        return redirect()->route('equips.index')->with('success', __('Equip creat correctament!'));
    }

    public function show(Equip $equip) {
        $equip->load(['estadi', 'jugadoras']); // Cargamos jugadoras para ver quién juega ahí
        return view('equips.show', compact('equip'));
    }

    public function edit(Equip $equip) {
        $estadis = Estadi::all();
        return view('equips.edit', compact('equip', 'estadis'));
    }

    public function update(UpdateEquipRequest $request, Equip $equip)
    {
        $this->servei->actualitzar($equip->id, $request->validated(), $request->file('escut'));
        return redirect()->route('equips.index')->with('success', __('Equip actualitzat!'));
    }

    public function destroy(Equip $equip) {
        $this->servei->eliminar($equip->id);
        return redirect()->route('equips.index');
    }
}