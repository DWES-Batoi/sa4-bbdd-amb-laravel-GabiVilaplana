<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class JugadoraResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'nom' => $this->nom,
            'equip_id' => $this->equip_id,
            'posicio' => $this->posicio,
            'dorsal' => $this->dorsal,
            'edat' => $this->edat,
        ];
    }
}