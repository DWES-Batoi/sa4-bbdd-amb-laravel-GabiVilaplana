<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Model EQUIP
 */
class Equip extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = ['nom', 'estadi_id', 'titols', 'escut'];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function estadi()
    {
        return $this->belongsTo(Estadi::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function manager()
    {
        return $this->hasOne(User::class   );
    }

    public function partitsComLocal()
    {
        return $this->hasMany(Partit::class, 'local_id');
    }

    /**
     * Partits com a equip visitant.
     */
    public function partitsComVisitant()
    {
        return $this->hasMany(Partit::class, 'visitant_id');
    }

    /**
     * Tots els partits en què ha participat (combinació).
     */
    public function partits()
    {
        return $this->partitsComLocal()->union($this->partitsComVisitant());
    }
}
