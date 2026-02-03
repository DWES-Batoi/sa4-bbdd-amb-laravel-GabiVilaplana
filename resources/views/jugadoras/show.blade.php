@extends('layouts.equip')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-xl mt-10 text-gray-900">
  
  <h1 class="text-3xl font-extrabold mb-6 border-b pb-4 text-gray-900">
    {{ $jugadora->nom }} {{ $jugadora->cognom }}
  </h1>
  
  <div class="space-y-4 text-lg">
    <p><strong class="text-gray-900">{{ __('Dorsal') }}:</strong> {{ $jugadora->dorsal ?? '—' }}</p>
    
    <p><strong class="text-gray-900">{{ __('Edat') }}:</strong> 
        {{ $jugadora->edat ? $jugadora->edat . ' ' . __('anys') : '—' }}
    </p>
    
    <p><strong class="text-gray-900">{{ __('Posició') }}:</strong> {{ $jugadora->posicio ?? '—' }}</p>
    
    <p>
      <strong class="text-gray-900">{{ __('Equip') }}:</strong>
      @if($jugadora->equip)
        <a href="{{ route('equips.show', $jugadora->equip) }}" class="text-blue-600 hover:underline font-medium">
          {{ $jugadora->equip->nom }}
        </a>
      @else
        —
      @endif
    </p>
  </div>

  <div class="mt-8 pt-6 border-t flex gap-4">
    <a href="{{ route('jugadoras.edit', $jugadora) }}" 
       class="inline-block bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-6 rounded shadow-md no-underline border-none">
        {{ __('Editar') }}
    </a>
    
    <a href="{{ route('jugadoras.index') }}" 
       class="inline-block !bg-gray-800 hover:!bg-black !text-white font-bold py-2 px-6 rounded shadow-md no-underline border-none">
        {{ __('Tornar') }}
    </a>
  </div>
</div>
@endsection