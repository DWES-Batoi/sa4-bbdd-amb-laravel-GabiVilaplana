@extends('layouts.equip')

@section('content')
<div class="container">
  <h1 class="title">Editar partit</h1>

  <form method="POST" action="{{ route('partits.update', $partit) }}">
    @csrf
    @method('PUT')

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
      <div>
        <label class="block font-bold">Equip local</label>
        <select name="local_id" class="border p-2 w-full" required>
          <option value="">Selecciona...</option>
          @foreach($equips as $equip)
            <option value="{{ $equip->id }}" {{ old('local_id', $partit->local_id) == $equip->id ? 'selected' : '' }}>
              {{ $equip->nom }}
            </option>
          @endforeach
        </select>
      </div>

      <div>
        <label class="block font-bold">Equip visitant</label>
        <select name="visitant_id" class="border p-2 w-full" required>
          <option value="">Selecciona...</option>
          @foreach($equips as $equip)
            <option value="{{ $equip->id }}" {{ old('visitant_id', $partit->visitant_id) == $equip->id ? 'selected' : '' }}>
              {{ $equip->nom }}
            </option>
          @endforeach
        </select>
      </div>

      <div>
        <label class="block font-bold">Estadi</label>
        <select name="estadi_id" class="border p-2 w-full" required>
          <option value="">Selecciona...</option>
          @foreach($estadis as $estadi)
            <option value="{{ $estadi->id }}" {{ old('estadi_id', $partit->estadi_id) == $estadi->id ? 'selected' : '' }}>
              {{ $estadi->nom }}
            </option>
          @endforeach
        </select>
      </div>

      <div>
        <label class="block font-bold">Data</label>
        <input type="date" name="data" value="{{ old('data', $partit->data->format('Y-m-d')) }}" class="border p-2 w-full" required>
      </div>

      <div>
        <label class="block font-bold">Jornada</label>
        <input type="number" name="jornada" min="1" value="{{ old('jornada', $partit->jornada) }}" class="border p-2 w-full" required>
      </div>

      <div>
        <label class="block font-bold">Gols local</label>
        <input type="number" name="gols_local" min="0" value="{{ old('gols_local', $partit->gols_local) }}" class="border p-2 w-full">
      </div>

      <div>
        <label class="block font-bold">Gols visitant</label>
        <input type="number" name="gols_visitant" min="0" value="{{ old('gols_visitant', $partit->gols_visitant) }}" class="border p-2 w-full">
      </div>
    </div>

    <div class="mt-6 flex gap-3">
      <button type="submit" class="btn btn--primary">Actualitzar partit</button>
      <a href="{{ route('partits.index') }}" class="btn btn--ghost">Cancel·lar</a>
    </div>
  </form>
</div>
@endsection