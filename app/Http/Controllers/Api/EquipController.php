<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Equip;
use App\Http\Resources\EquipResource;
use Illuminate\Http\Request;

class EquipController extends Controller
{
    public function index() {
        return EquipResource::collection(Equip::all());
    }

    public function store(Request $request) {
        $data = $request->validate(['nom' => 'required|string|max:255', 'estadi' => 'nullable|string']);
        $equip = Equip::create($data);
        return response()->json(new EquipResource($equip), 201);
    }

    public function destroy(Equip $equip) {
        $equip->delete();
        return response()->noContent();
    }
}
