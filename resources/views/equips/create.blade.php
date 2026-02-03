@extends('layouts.equip')

@section('content')
<div class="max-w-2xl mx-auto py-8">
    <h1 class="text-2xl font-bold mb-6 text-white">{{ __('Afegir nou equip') }}</h1>

    <form action="{{ route('equips.store') }}" method="POST" enctype="multipart/form-data" class="bg-slate-800 p-6 rounded-lg shadow-lg space-y-4">
        @csrf
        <div>
            <label class="block font-bold text-gray-200 mb-1">{{ __('Nom') }}:</label>
            <input type="text" name="nom" value="{{ old('nom') }}" class="w-full p-2 rounded bg-white text-gray-900 border-none" required>
        </div>

        <div>
            <label class="block font-bold text-gray-200 mb-1">{{ __('Estadi') }}:</label>
            <select name="estadi_id" class="w-full p-2 rounded bg-white text-gray-900 border-none" required>
                @foreach ($estadis as $estadi)
                    <option value="{{ $estadi->id }}" @selected(old('estadi_id') == $estadi->id)>{{ $estadi->nom }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block font-bold text-gray-200 mb-1">{{ __('Títols') }}:</label>
            <input type="number" name="titols" value="{{ old('titols', 0) }}" class="w-full p-2 rounded bg-white text-gray-900 border-none">
        </div>

        <div>
            <label class="block font-bold text-gray-200 mb-1">{{ __('Escut') }}:</label>
            <input type="file" name="escut" class="w-full p-2 rounded bg-white text-gray-900">
        </div>

        <div class="pt-4">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded shadow">
                {{ __('Afegir') }}
            </button>
            <a href="{{ route('equips.index') }}" class="ml-4 text-gray-400 hover:text-white">{{ __('Cancelar') }}</a>
        </div>
    </form>
</div>
@endsection