@extends('layouts.equip')

@section('content')
<div class="max-w-4xl mx-auto mt-10">
    {{-- Tarjeta Principal --}}
    <div class="bg-white rounded-xl shadow-2xl overflow-hidden text-gray-900">
        
        {{-- Cabecera con Degradado sutil y Escudo --}}
        <div class="bg-gradient-to-r from-slate-100 to-white p-8 border-b flex flex-col md:flex-row items-center gap-8">
            <div class="relative">
                @if($equip->escut)
                    <img src="{{ asset('storage/' . $equip->escut) }}" 
                         class="h-32 w-32 rounded-2xl shadow-lg object-cover border-4 border-white ring-1 ring-gray-200">
                @else
                    <div class="h-32 w-32 rounded-2xl bg-gray-200 flex items-center justify-center text-gray-400">
                        <span class="text-4xl">⚽</span>
                    </div>
                @endif
            </div>
            
            <div class="text-center md:text-left">
                <h1 class="text-5xl font-black text-gray-900 tracking-tight mb-2">{{ $equip->nom }}</h1>
                <div class="flex flex-wrap justify-center md:justify-start gap-4 mt-2">
                    <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-bold flex items-center gap-1">
                        🏟️ {{ $equip->estadi->nom ?? 'Sense estadi' }}
                    </span>
                    <span class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-sm font-bold flex items-center gap-1">
                        🏆 {{ $equip->titols }} {{ __('Títols') }}
                    </span>
                </div>
            </div>
        </div>

        {{-- Cuerpo de la vista --}}
        <div class="p-8">
            <div class="flex items-center justify-between mb-6 border-b pb-2">
                <h2 class="text-2xl font-bold text-gray-800">{{ __('Plantilla Oficial') }}</h2>
                <span class="text-gray-500 text-sm font-medium">{{ $equip->jugadoras->count() }} {{ __('Jugadores') }}</span>
            </div>

            {{-- Listado de Jugadoras estilo Tabla Moderna --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                @forelse($equip->jugadoras as $jugadora)
                    <a href="{{ route('jugadoras.show', $jugadora) }}" 
                       class="flex items-center justify-between p-4 rounded-xl border border-gray-100 bg-gray-50 hover:bg-blue-50 hover:border-blue-200 transition-all group">
                        <div class="flex items-center gap-4">
                            <span class="h-10 w-10 flex items-center justify-center bg-white border border-gray-200 rounded-full font-black text-blue-600 shadow-sm group-hover:bg-blue-600 group-hover:text-white transition-colors">
                                {{ $jugadora->dorsal ?? '--' }}
                            </span>
                            <div>
                                <p class="font-bold text-gray-900">{{ $jugadora->nom }} {{ $jugadora->cognom }}</p>
                                <p class="text-xs text-gray-500 uppercase tracking-wider">{{ $jugadora->posicio ?? 'Posició no definida' }}</p>
                            </div>
                        </div>
                        <span class="text-gray-300 group-hover:text-blue-400">➡️</span>
                    </a>
                @empty
                    <div class="col-span-2 py-10 text-center bg-gray-50 rounded-xl border-2 border-dashed border-gray-200">
                        <p class="text-gray-400 italic">{{ __('No hi ha jugadores registrades en aquest equip.') }}</p>
                    </div>
                @endforelse
            </div>
        </div>

        {{-- Acciones Footer --}}
        <div class="bg-gray-50 p-6 flex items-center gap-4 justify-end">
            <a href="{{ route('equips.edit', $equip) }}" 
               class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-6 shadow transition-transform active:scale-95 no-underline">
                {{ __('Editar') }}
            </a>
            <a href="{{ route('equips.index') }}" 
               class="!bg-gray-800 hover:!bg-black !text-white font-bold py-2 px-6 shadow transition-transform active:scale-95 no-underline">
                {{ __('Tornar') }}
            </a>
        </div>
    </div>
</div>
@endsection