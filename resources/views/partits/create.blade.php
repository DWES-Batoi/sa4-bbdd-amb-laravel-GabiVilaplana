@extends('layouts.equip')

@section('content')
<div class="container">
  <h1 class="title">{{ __('Crear nou partit') }}</h1>

  <form method="POST" action="{{ route('partits.store') }}">
    @csrf
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
      <div>
        <label class="block font-bold">{{ __('Equip local') }}</label>
        <select name="local_id" class="border p-2 w-full" required>
          <option value="">{{ __('Selecciona...') }}</option>
          @foreach($equips as $equip)
            <option value="{{ $equip->id }}">{{ $equip->nom }}</option>
          @endforeach
        </select>
      </div>

      <div>
        <label class="block font-bold">{{ __('Equip visitant') }}</label>
        <select name="visitant_id" class="border p-2 w-full" required>
          <option value="">{{ __('Selecciona...') }}</option>
          @foreach($equips as $equip)
            <option value="{{ $equip->id }}">{{ $equip->nom }}</option>
          @endforeach
        </select>
      </div>

      <div>
        <label class="block font-bold">{{ __('Estadi') }}</label>
        <select name="estadi_id" class="border p-2 w-full" required>
          <option value="">{{ __('Selecciona...') }}</option>
          @foreach($estadis as $estadi)
            <option value="{{ $estadi->id }}">{{ $estadi->nom }}</option>
          @endforeach
        </select>
      </div>

      <div>
        <label class="block font-bold">{{ __('Data') }}</label>
        <input type="date" name="data" class="border p-2 w-full" required>
      </div>

      <div>
        <label class="block font-bold">{{ __('Jornada') }}</label>
        <input type="number" name="jornada" min="1" class="border p-2 w-full" required>
      </div>

      <div>
        <label class="block font-bold">{{ __('Gols local') }}</label>
        <input type="number" name="gols_local" min="0" value="0" class="border p-2 w-full">
      </div>

      <div>
        <label class="block font-bold">{{ __('Gols visitant') }}</label>
        <input type="number" name="gols_visitant" min="0" value="0" class="border p-2 w-full">
      </div>
    </div>

    <button type="submit" class="btn btn--primary mt-4">{{ __('Crear partit') }}</button>
  </form>
</div>
@endsection