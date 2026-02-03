@extends('layouts.equip')

@section('content')
<div class="max-w-2xl mx-auto py-8">
    <h1 class="text-2xl font-bold mb-6 text-white">{{ __('Afegir Jugadora') }}</h1>

    <form action="{{ route('jugadoras.store') }}" method="POST" class="bg-slate-800 p-6 rounded-lg shadow-lg space-y-4">
        @csrf

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block font-bold text-gray-200 mb-1">{{ __('Nom') }}:</label>
                <input type="text" name="nom" value="{{ old('nom') }}" class="w-full p-2 rounded bg-white text-gray-900 border border-gray-300" required>
            </div>
            <div>
                <label class="block font-bold text-gray-200 mb-1">{{ __('Cognom') }}:</label>
                <input type="text" name="cognom" value="{{ old('cognom') }}" class="w-full p-2 rounded bg-white text-gray-900 border border-gray-300" required>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block font-bold text-gray-200 mb-1">{{ __('Dorsal') }}:</label>
                <input type="number" name="dorsal" value="{{ old('dorsal') }}" class="w-full p-2 rounded bg-white text-gray-900 border border-gray-300">
            </div>
            <div>
                <label class="block font-bold text-gray-200 mb-1">{{ __('Edat') }}:</label>
                <input type="number" name="edat" value="{{ old('edat') }}" class="w-full p-2 rounded bg-white text-gray-900 border border-gray-300">
            </div>
        </div>

        <div>
            <label class="block font-bold text-gray-200 mb-1">{{ __('Posició') }}:</label>
            <input type="text" name="posicio" value="{{ old('posicio') }}" class="w-full p-2 rounded bg-white text-gray-900 border border-gray-300">
        </div>

        <div>
            <label class="block font-bold text-gray-200 mb-1">{{ __('Equip') }}:</label>
            <select name="equip_id" class="w-full p-2 rounded bg-white text-gray-900 border border-gray-300" required>
                <option value="">{{ __('Selecciona un equip') }}</option>
                @foreach ($equips as $equip)
                    <option value="{{ $equip->id }}" {{ old('equip_id') == $equip->id ? 'selected' : '' }}>{{ $equip->nom }}</option>
                @endforeach
            </select>
        </div>

        <div class="pt-4">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded shadow">
                {{ __('Afegir') }}
            </button>
            <a href="{{ route('jugadoras.index') }}" class="ml-4 text-gray-400 hover:text-white">{{ __('Tornar') }}</a>
        </div>
    </form>
</div>
@endsection