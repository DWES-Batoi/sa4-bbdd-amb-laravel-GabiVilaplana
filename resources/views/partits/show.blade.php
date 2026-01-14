@extends('layouts.app')

@section('content')
<div class="container">
  <h1 class="title">Detall del partit</h1>

  <article class="card max-w-2xl mx-auto">
    <header class="card__header">
      <h2 class="card__title">{{ $partit->local->nom }} vs {{ $partit->visitant->nom }}</h2>
      <span class="card__badge">Jornada {{ $partit->jornada }}</span>
    </header>

    <div class="card__body">
      <p><strong>Estadi:</strong> {{ $partit->estadi->nom }}</p>
      <p><strong>Data:</strong> {{ $partit->data->format('d/m/Y') }}</p>
      <p><strong>Resultat:</strong> 
        <span class="font-bold">{{ $partit->gols_local }} - {{ $partit->gols_visitant }}</span>
      </p>
    </div>

    <footer class="card__footer justify-end">
      <a class="btn btn--ghost" href="{{ route('partits.index') }}">Tornar</a>
      <a class="btn btn--primary" href="{{ route('partits.edit', $partit) }}">Editar</a>

      <form method="POST" action="{{ route('partits.destroy', $partit) }}" class="inline">
        @csrf
        @method('DELETE')
        <button class="btn btn--danger" type="submit" onclick="return confirm('Segur que vols eliminar aquest partit?')">
          Eliminar
        </button>
      </form>
    </footer>
  </article>
</div>
@endsection