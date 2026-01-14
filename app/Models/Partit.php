<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partit extends Model
{
    use HasFactory;

    protected $fillable = [
        'local_id',
        'visitant_id',
        'estadi_id',
        'data',
        'jornada',
        'gols_local',
        'gols_visitant',
    ];

    protected $casts = [
        'data' => 'date',
    ];

    // Relació: equip local
    public function local()
    {
        return $this->belongsTo(Equip::class, 'local_id');
    }

    // Relació: equip visitant
    public function visitant()
    {
        return $this->belongsTo(Equip::class, 'visitant_id');
    }

    // Relació: estadi
    public function estadi()
    {
        return $this->belongsTo(Estadi::class);
    }

    // Opcional: accés invers des d'Equip
    // (ja l'afegirem a Equip.php més avall)
}