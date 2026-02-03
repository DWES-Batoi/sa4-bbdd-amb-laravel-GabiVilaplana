<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// Importante: asegúrate de que se importe el modelo de Jugadora si está en otra carpeta, 
// aunque si están ambos en App\Models no hace falta.

class Equip extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'estadi_id', 'titols', 'escut'];

    // Relación con el Estadio (esta ya la debes tener para que funcione el Index)
    public function estadi()
    {
        return $this->belongsTo(Estadi::class);
    }

    // ✅ ESTO ES LO QUE FALTA: Un equipo tiene muchas jugadoras
    public function jugadoras()
    {
        // Usamos hasMany porque un equipo tiene muchas jugadoras
        return $this->hasMany(Jugadora::class);
    }
}