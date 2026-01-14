@extends('layouts.app')
@section('title', 'Editar equip')

@section('content')
<div class="container">
  <h1 class="title">Editar equip</h1>

  @if ($errors->any())
    <div class="bg-red-100 text-red-700 p-2 mb-4">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('equips.update', $equip) }}" method="POST" class="space-y-4">
    @csrf
    @method('PUT')

    <div>
      <label for="nom" class="block font-bold">Nom:</label>
      <input
        type="text"
        name="nom"
        id="nom"
        value="{{ old('nom', $equip->nom) }}"
        class="border p-2 w-full"
        required
      >
    </div>

    <div>
      <label for="estadi_id" class="block font-bold">Estadi:</label>
      <select name="estadi_id" id="estadi_id" class="border p-2 w-full" required>
        <option value="">Selecciona un estadi</option>
        @foreach ($estadis as $estadi)
          <option value="{{ $estadi->id }}"
            {{ old('estadi_id', $equip->estadi_id) == $estadi->id ? 'selected' : '' }}>
            {{ $estadi->nom }}
          </option>
        @endforeach
      </select>
    </div>

    <div>
      <label for="titols" class="block font-bold">Títols:</label>
      <input
        type="number"
        name="titols"
        id="titols"
        value="{{ old('titols', $equip->titols) }}"
        class="border p-2 w-full"
        required
      >
    </div>

    <div class="flex gap-3">
      <button type="submit" class="btn btn--primary">Actualitzar equip</button>
      <a href="{{ route('equips.index') }}" class="btn btn--ghost">Cancel·lar</a>
    </div>
  </form>
</div>
@endsection