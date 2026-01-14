<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jugadora extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',          // en lugar de 'nombre'
        'cognom',       // en lugar de 'apellido'
        'numero',
        'posicio',      // en lugar de 'posicion'
        'equip_id',
        // 'estadi_id' se elimina: se accede vía equipo->estadi si es necesario
    ];

    /**
     * Relación: una jugadora pertenece a un equip.
     */
    public function equip()
    {
        return $this->belongsTo(Equip::class);
    }

    // Opcional: acceso al estadio a través del equip
    public function getEstadiAttribute()
    {
        return $this->equip?->estadi;
    }
}