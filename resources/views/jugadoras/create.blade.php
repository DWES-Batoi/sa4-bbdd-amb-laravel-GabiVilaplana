@extends('layouts.equip')

@section('title', __('Afegir nova jugadora'))

@section('content')
<h1 class="text-2xl font-bold mb-4">{{ __('Afegir nova jugadora') }}</h1>

@if ($errors->any())
  <div class="bg-red-100 text-red-700 p-2 mb-4">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

<form action="{{ route('jugadoras.store') }}" method="POST" class="space-y-4">
  @csrf

  <div>
    <label for="nom" class="block font-bold">{{ __('Nom') }}:</label>
    <input type="text" name="nom" id="nom" value="{{ old('nom') }}" class="border p-2 w-full" required>
  </div>

  <div>
    <label for="cognom" class="block font-bold">{{ __('Cognom') }}:</label>
    <input type="text" name="cognom" id="cognom" value="{{ old('cognom') }}" class="border p-2 w-full" required>
  </div>

  <div>
    <label for="numero" class="block font-bold">{{ __('Número') }}:</label>
    <input type="number" name="numero" id="numero" value="{{ old('numero') }}" min="1" class="border p-2 w-full">
  </div>

  <div>
    <label for="posicio" class="block font-bold">{{ __('Posició') }}:</label>
    <input type="text" name="posicio" id="posicio" value="{{ old('posicio') }}" class="border p-2 w-full">
  </div>

  <div>
    <label for="equip_id" class="block font-bold">{{ __('Equip') }}:</label>
    <select name="equip_id" id="equip_id" class="border p-2 w-full" required>
      <option value="">{{ __('Selecciona un equip') }}</option>
      @foreach ($equips as $equip)
        <option value="{{ $equip->id }}" {{ old('equip_id') == $equip->id ? 'selected' : '' }}>
          {{ $equip->nom }}
        </option>
      @endforeach
    </select>
  </div>

  <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">{{ __('Afegir') }}</button>
</form>
@endsection