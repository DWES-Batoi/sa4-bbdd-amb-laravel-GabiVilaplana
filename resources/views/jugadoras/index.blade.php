@extends('layouts.equip')

@section('content')
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-white">{{ __('Llistat de Jugadores') }}</h1>
        <a href="{{ route('jugadoras.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow">
            + {{ __('Afegir Jugadora') }}
        </a>
    </div>

    <div class="bg-gray-800 shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full leading-normal">
            <thead>
                <tr class="bg-gray-700 text-gray-300 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">{{ __('Jugadora') }}</th>
                    <th class="py-3 px-6 text-center">{{ __('Dorsal') }}</th>
                    <th class="py-3 px-6 text-center">{{ __('Posició') }}</th>
                    <th class="py-3 px-6 text-left">{{ __('Equip') }}</th>
                    <th class="py-3 px-6 text-center">{{ __('Accions') }}</th>
                </tr>
            </thead>
            <tbody class="text-gray-300 text-sm font-light">
                @foreach ($jugadoras as $jugadora)
                <tr class="border-b border-gray-700 hover:bg-gray-700">
                    <td class="py-3 px-6 text-left whitespace-nowrap">
                        <div class="font-medium">{{ $jugadora->nom }} {{ $jugadora->cognom }}</div>
                        <div class="text-xs text-gray-500">ID: {{ $jugadora->id }} | {{ $jugadora->edat ?? '?' }} {{ __('anys') }}</div>
                    </td>
                    <td class="py-3 px-6 text-center">
                        <span class="bg-blue-900 text-blue-200 py-1 px-3 rounded-full text-xs font-bold">
                            {{ $jugadora->dorsal ?? '—' }}
                        </span>
                    </td>
                    <td class="py-3 px-6 text-center">
                        {{ $jugadora->posicio ?? '—' }}
                    </td>
                    <td class="py-3 px-6 text-left">
                        @if($jugadora->equip)
                            <a href="{{ route('equips.show', $jugadora->equip) }}" class="text-blue-400 hover:underline">
                                {{ $jugadora->equip->nom }}
                            </a>
                        @else
                            <span class="text-gray-600">—</span>
                        @endif
                    </td>
                    <td class="py-3 px-6 text-center">
                        <div class="flex item-center justify-center space-x-4">
                            <a href="{{ route('jugadoras.show', $jugadora) }}" class="text-gray-400 hover:text-white" title="{{ __('Veure') }}">
                                👁️
                            </a>
                            <a href="{{ route('jugadoras.edit', $jugadora) }}" class="text-yellow-500 hover:text-yellow-400" title="{{ __('Editar') }}">
                                ✏️
                            </a>
                            <form action="{{ route('jugadoras.destroy', $jugadora) }}" method="POST" onsubmit="return confirm('{{ __('Segur que vols eliminar aquesta jugadora?') }}');">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-400" title="{{ __('Eliminar') }}">
                                    🗑️
                                </button>
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