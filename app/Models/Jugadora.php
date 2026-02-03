<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jugadora extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'cognom',
        'dorsal', // Asegúrate de que se llame así y no 'numero'
        'edat',   // ¡Asegúrate de añadir este!
        'posicio',
        'equip_id',
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