<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JugadoraRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // ¡Cambia esto a true si quieres permitir solicitudes!
    }

    public function rules(): array
    {
        return [
            'nom'      => ['required', 'string', 'max:255'],
            'cognom'   => ['required', 'string', 'max:255'],
            'dorsal'   => ['nullable', 'integer', 'min:0', 'max:99'], // Cambiado de 'numero' a 'dorsal'
            'edat'     => ['nullable', 'integer', 'min:0'],           // Añadido edat
            'posicio'  => ['nullable', 'string', 'max:100'],
            'equip_id' => ['required', 'exists:equips,id'],
        ];
    }
}