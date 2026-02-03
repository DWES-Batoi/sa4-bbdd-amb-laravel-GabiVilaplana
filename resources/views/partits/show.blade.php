@extends('layouts.equip')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-xl mt-10 text-gray-900">
  <h1 class="text-3xl font-extrabold mb-6 border-b pb-4 text-gray-900">{{ __('Detall del partit') }}</h1>

  <div class="text-center mb-8">
      <div class="text-gray-500 uppercase tracking-widest text-sm mb-2">{{ __('Jornada') }} {{ $partit->jornada }}</div>
      <div class="flex items-center justify-around">
          <div class="text-2xl font-bold">{{ $partit->local->nom }}</div>
          <div class="bg-gray-100 px-6 py-2 rounded-lg text-4xl font-black">{{ $partit->gols_local }} - {{ $partit->gols_visitant }}</div>
          <div class="text-2xl font-bold">{{ $partit->visitant->nom }}</div>
      </div>
  </div>

  <div class="space-y-4 text-lg border-t pt-6">
    <p><strong class="text-gray-900">{{ __('Estadi') }}:</strong> {{ $partit->estadi->nom }}</p>
    <p><strong class="text-gray-900">{{ __('Data') }}:</strong> {{ $partit->data->format('d/m/Y') }}</p>
  </div>

  <div class="mt-8 pt-6 border-t flex gap-4">
    <a href="{{ route('partits.edit', $partit) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-6 rounded shadow no-underline border-none">
        {{ __('Editar') }}
    </a>
    <a href="{{ route('partits.index') }}" class="!bg-gray-800 hover:!bg-black !text-white font-bold py-2 px-6 rounded shadow no-underline border-none">
        {{ __('Tornar') }}
    </a>
    <form method="POST" action="{{ route('partits.destroy', $partit) }}" onsubmit="return confirm('{{ __('Segur que vols eliminar aquest partit?') }}');" class="ml-auto">
        @csrf @method('DELETE')
        <button class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-6 rounded shadow">{{ __('Eliminar') }}</button>
    </form>
  </div>
</div>
@endsection