<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EquipResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'nom' => $this->nom,
            'estadi_id' => $this->estadi_id,
            'titols' => $this->titols,
            'escut' => $this->escut,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}