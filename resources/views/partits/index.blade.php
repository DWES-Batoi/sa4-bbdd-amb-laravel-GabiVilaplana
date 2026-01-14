@extends('layouts.app')

@section('content')
<div class="container">
  <h1 class="title">Listado de partits</h1>

    <p class="mb-4">
        <a href="{{ route('partits.create') }}" class="btn btn--primary">Nou Partit</a>
    </p>

  <div class="grid-cards">
    @foreach ($partits as $partit)
      <article class="card">
        <header class="card__header">
          <h2 class="card__title">{{ $partit->local->nom }} vs {{ $partit->visitant->nom }}</h2>
          <span class="card__badge">Jornada {{ $partit->jornada }}</span>
        </header>

        <div class="card__body">
          <p><strong>Estadi:</strong> {{ $partit->estadi->nom ?? '—' }}</p>
          <p><strong>Data:</strong> {{ $partit->data->format('d/m/Y') }}</p>
          <p><strong>Resultat:</strong> {{ $partit->gols_local }} - {{ $partit->gols_visitant }}</p>
        </div>

        <footer class="card__footer">
          <a class="btn btn--ghost" href="{{ route('partits.show', $partit) }}">Ver</a>
          <a class="btn btn--primary" href="{{ route('partits.edit', $partit) }}">Editar</a>

          <form method="POST" action="{{ route('partits.destroy', $partit) }}" class="inline">
            @csrf
            @method('DELETE')
            <button class="btn btn--danger" type="submit">Eliminar</button>
          </form>
        </footer>
      </article>
    @endforeach
  </div>
</div>
@endsection