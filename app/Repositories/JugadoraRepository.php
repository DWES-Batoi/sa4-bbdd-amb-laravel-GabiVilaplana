<?php

namespace App\Repositories;

use App\Models\Jugadora;

class JugadoraRepository
{
    public function all()
    {
        // Carga la relación 'equip' (nombre correcto del modelo)
        // No se carga 'estadi' porque ya no hay relación directa
        return Jugadora::with('equip')->get();
    }

    public function create(array $data)
    {
        return Jugadora::create($data);
    }

    public function update(Jugadora $jugadora, array $data)
    {
        $jugadora->update($data);
        return $jugadora;
    }

    public function delete(Jugadora $jugadora)
    {
        $jugadora->delete();
    }
}