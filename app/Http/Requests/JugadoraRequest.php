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
            'nom' => ['required', 'string', 'max:255'],
            'equip_id' => ['required', 'exists:equips,id'],
            'posicio' => ['nullable', 'string', 'max:100'],
            'dorsal' => ['nullable', 'integer', 'min:0', 'max:99'],
            'edat' => ['nullable', 'integer', 'min:0', 'max:120'],
        ];
    }
}