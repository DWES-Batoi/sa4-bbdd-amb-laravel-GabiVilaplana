@extends('layouts.equip')

@section('title', __('Detall de Jugadora'))

@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">
  <h1 class="text-2xl font-bold mb-4">{{ $jugadora->nom }} {{ $jugadora->cognom }}</h1>
  
  <p><strong>{{ __('Número') }}:</strong> {{ $jugadora->numero ?? '—' }}</p>
  <p><strong>{{ __('Posició') }}:</strong> {{ $jugadora->posicio ?? '—' }}</p>
  <p>
    <strong>{{ __('Equip') }}:</strong>
    @if($jugadora->equip)
      <a href="{{ route('equips.show', $jugadora->equip->id) }}" class="text-blue-600 hover:underline">
        {{ $jugadora->equip->nom }}
      </a>
    @else
      —
    @endif
  </p>

  <div class="mt-6 space-x-2">
    <a href="{{ route('jugadoras.edit', $jugadora) }}" class="bg-yellow-500 text-white px-3 py-1 rounded">{{ __('Editar') }}</a>
    <a href="{{ route('jugadoras.index') }}" class="bg-gray-500 text-white px-3 py-1 rounded">{{ __('Tornar') }}</a>
  </div>
</div>
@endsection