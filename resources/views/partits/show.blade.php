@extends('layouts.equip')

@section('content')
<div class="container">
  <h1 class="title">{{ __('Detall del partit') }}</h1>

  <article class="card max-w-2xl mx-auto">
    <header class="card__header">
      <h2 class="card__title">{{ $partit->local->nom }} vs {{ $partit->visitant->nom }}</h2>
      <span class="card__badge">{{ __('Jornada') }} {{ $partit->jornada }}</span>
    </header>

    <div class="card__body">
      <p><strong>{{ __('Estadi') }}:</strong> {{ $partit->estadi->nom }}</p>
      <p><strong>{{ __('Data') }}:</strong> {{ $partit->data->format('d/m/Y') }}</p>
      <p><strong>{{ __('Resultat') }}:</strong> 
        <span class="font-bold">{{ $partit->gols_local }} - {{ $partit->gols_visitant }}</span>
      </p>
    </div>

    <footer class="card__footer justify-end">
      <a class="btn btn--ghost" href="{{ route('partits.index') }}">{{ __('Tornar') }}</a>
      <a class="btn btn--primary" href="{{ route('partits.edit', $partit) }}">{{ __('Editar') }}</a>

      <form method="POST" action="{{ route('partits.destroy', $partit) }}" class="inline"
            onsubmit="return confirm('{{ __('Segur que vols eliminar aquest partit?') }}');">
        @csrf
        @method('DELETE')
        <button class="btn btn--danger" type="submit">{{ __('Eliminar') }}</button>
      </form>
    </footer>
  </article>
</div>
@endsection