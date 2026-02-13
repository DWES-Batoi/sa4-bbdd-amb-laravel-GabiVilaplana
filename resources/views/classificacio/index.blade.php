@extends('layouts.equip')

@section('content')
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <h1 class="text-3xl font-bold text-white mb-6">{{ __('Classificació en temps real') }}</h1>

    <!-- Alerta que aparecerá cuando haya cambios -->
    <div id="alerta" class="hidden mb-4 p-4 bg-green-600 text-white rounded-lg shadow-lg animate-bounce">
        {{ __('Classificació actualitzada! ✅') }}
    </div>

    <div class="bg-gray-800 shadow-md rounded-lg overflow-hidden border border-gray-700">
        <table class="min-w-full leading-normal">
            <thead>
                <tr class="bg-gray-700 text-gray-300 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">Pos</th>
                    <th class="py-3 px-6 text-left">Equip</th>
                </tr>
            </thead>
            <tbody class="text-gray-300 text-sm font-light">
                @foreach($equips as $equip)
                    <tr data-equip-id="{{ $equip->id }}" class="border-b border-gray-700 transition-colors duration-500">
                        <td class="py-3 px-6 text-left font-bold">
                            {{ $posicions[$equip->id] ?? '-' }}
                        </td>
                        <td class="py-3 px-6 text-left font-medium text-white">
                            {{ $equip->nom }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Lógica de Tiempo Real -->
<script>
    window.addEventListener('classificacio-delta', (ev) => {
        // 1. Mostrar la alerta unos segundos
        const alerta = document.getElementById('alerta');
        if (alerta) {
            alerta.classList.remove('hidden');
            setTimeout(() => alerta.classList.add('hidden'), 3000);
        }

        // 2. Aplicar colores a las filas que han cambiado
        (ev.detail || []).forEach(item => {
            const row = document.querySelector(`[data-equip-id="${item.equip_id}"]`);
            if (!row) return;

            // Limpiamos clases anteriores
            row.style.backgroundColor = ''; 
            
            // Si el delta es positivo (>0) es que ha subido puestos
            if (item.delta > 0) {
                row.style.backgroundColor = 'rgba(16, 185, 129, 0.2)'; // Verde suave
            } 
            // Si es negativo ha bajado
            else if (item.delta < 0) {
                row.style.backgroundColor = 'rgba(239, 68, 68, 0.2)'; // Rojo suave
            }

            // Quitar el color después de 5 segundos
            setTimeout(() => {
                row.style.backgroundColor = '';
            }, 5000);
        });
    });
</script>
@endsection