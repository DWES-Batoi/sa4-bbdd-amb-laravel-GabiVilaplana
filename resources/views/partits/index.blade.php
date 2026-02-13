@extends('layouts.equip')

@section('content')
<div class="container">
  <h1 class="title text-white mb-6">{{ __('Listado de partits') }}</h1>

  <p class="mb-4">
    <a href="{{ route('partits.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow">
      {{ __('Nou Partit') }}
    </a>
  </p>

  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach ($partits as $partit)
      <article class="bg-gray-800 rounded-lg shadow-lg border border-gray-700 p-6">
        <header class="flex justify-between items-start mb-4 border-b border-gray-700 pb-2">
          <h2 class="text-xl font-bold text-white">{{ $partit->local->nom }} vs {{ $partit->visitant->nom }}</h2>
          <span class="bg-blue-900 text-blue-200 py-1 px-3 rounded-full text-xs font-bold">{{ __('Jornada') }} {{ $partit->jornada }}</span>
        </header>

        <div class="text-gray-300 space-y-2 mb-6">
          <p><strong>{{ __('Estadi') }}:</strong> {{ $partit->estadi->nom ?? '—' }}</p>
          <p><strong>{{ __('Data') }}:</strong> {{ $partit->data->format('d/m/Y') }}</p>
          <p><strong>{{ __('Resultat') }}:</strong> <span class="text-white font-bold">{{ $partit->gols_local }} - {{ $partit->gols_visitant }}</span></p>
        </div>

        <footer class="flex items-center gap-4 pt-4 border-t border-gray-700 text-xl justify-center">
          <a class="hover:text-white" href="{{ route('partits.show', $partit) }}" title="{{ __('Veure') }}">👁️</a>
          <a class="text-yellow-500 hover:text-yellow-400" href="{{ route('partits.edit', $partit) }}" title="{{ __('Editar') }}">✏️</a>

          <form method="POST" action="{{ route('partits.destroy', $partit) }}" onsubmit="return confirm('{{ __('Segur que vols eliminar aquest partit?') }}');">
            @csrf @method('DELETE')
            <button class="text-red-500 hover:text-red-400" type="submit" title="{{ __('Eliminar') }}">🗑️</button>
          </form>
        </footer>
      </article>
    @endforeach
  </div>
</div>
@endsection