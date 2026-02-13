@extends('layouts.equip')

@section('content')
<div class="max-w-7xl mx-auto py-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-white">{{ __('Listado de equipos') }}</h1>
        <a href="{{ route('equips.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow">
            + {{ __('Nuevo Equipo') }}
        </a>
    </div>

    <div class="bg-gray-800 shadow-md rounded-lg overflow-hidden border border-gray-700">
        <table class="min-w-full leading-normal">
            <thead>
                <tr class="bg-gray-700 text-gray-300 uppercase text-sm">
                    <th class="py-3 px-6 text-left">{{ __('Escut') }}</th>
                    <th class="py-3 px-6 text-left">{{ __('Equip') }}</th>
                    <th class="py-3 px-6 text-left">{{ __('Estadi') }}</th>
                    <th class="py-3 px-6 text-center">{{ __('Títols') }}</th>
                    <th class="py-3 px-6 text-center">{{ __('Acciones') }}</th>
                </tr>
            </thead>
            <tbody class="text-gray-300 text-sm font-light">
                @foreach ($equips as $equip)
                <tr class="border-b border-gray-700 hover:bg-gray-700 transition">
                    <td class="py-3 px-6 text-left">
                        @if($equip->escut)
                            <img src="{{ asset('storage/' . $equip->escut) }}" class="h-10 w-10 rounded-full object-cover border border-gray-600">
                        @else
                            <div class="h-10 w-10 rounded-full bg-gray-600 flex items-center justify-center text-xs">N/A</div>
                        @endif
                    </td>
                    <td class="py-3 px-6 text-left font-bold text-white">{{ $equip->nom }}</td>
                    <td class="py-3 px-6 text-left">{{ $equip->estadi->nom ?? '—' }}</td>
                    <td class="py-3 px-6 text-center">
                        <span class="bg-yellow-900 text-yellow-200 py-1 px-3 rounded-full text-xs font-bold">{{ $equip->titols }}</span>
                    </td>
                    <td class="py-3 px-6 text-center">
                        <div class="flex item-center justify-center space-x-4 text-xl">
                            <a href="{{ route('equips.show', $equip) }}" class="hover:text-white" title="Ver">👁️</a>
                            <a href="{{ route('equips.edit', $equip) }}" class="text-yellow-500 hover:text-yellow-400" title="Editar">✏️</a>
                            <form action="{{ route('equips.destroy', $equip) }}" method="POST" onsubmit="return confirm('{{ __('¿Eliminar equipo?') }}');">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-400">🗑️</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection