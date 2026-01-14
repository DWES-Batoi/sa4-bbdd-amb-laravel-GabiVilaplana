<?php

namespace App\Http\Controllers;

use App\Models\Partit;
use App\Models\Equip;
use App\Models\Estadi;
use Illuminate\Http\Request;

class PartitController extends Controller
{
    public function index()
    {
        $partits = Partit::with(['local', 'visitant', 'estadi'])->get();
        return view('partits.index', compact('partits'));
    }

    public function create()
    {
        $equips = Equip::all();
        $estadis = Estadi::all();
        return view('partits.create', compact('equips', 'estadis'));
    }

    public function show(Partit $partit)
    {
        return view('partits.show', compact('partit'));
    }

    public function edit(Partit $partit)
    {
        $equips = Equip::all();
        $estadis = Estadi::all();
        return view('partits.edit', compact('partit', 'equips', 'estadis'));
    }

    public function update(Request $request, Partit $partit)
    {
        $validated = $request->validate([
            'local_id' => 'required|exists:equips,id',
            'visitant_id' => 'required|exists:equips,id|different:local_id',
            'estadi_id' => 'required|exists:estadis,id',
            'data' => 'required|date',
            'jornada' => 'required|integer|min:1',
            'gols_local' => 'nullable|integer|min:0',
            'gols_visitant' => 'nullable|integer|min:0',
        ]);

        $partit->update($validated);

        return redirect()->route('partits.index')->with('success', 'Partit actualitzat correctament.');
    }

    public function destroy(Partit $partit)
    {
        $partit->delete();

        return redirect()->route('partits.index')->with('success', 'Partit eliminat correctament.');
    }
}