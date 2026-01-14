@extends('layouts.app')

@section('content')
<div class="container">
  <h1 class="title">Listado de jugadoras</h1>

  <p class="mb-4">
    <a href="{{ route('jugadoras.create') }}" class="btn btn--primary">Nueva jugadora</a>
  </p>

  <div class="grid-cards">
    @foreach ($jugadoras as $jugadora)
      <article class="card">
        <header class="card__header">
          <h2 class="card__title">{{ $jugadora->nom }} {{ $jugadora->cognom }}</h2>
          <span class="card__badge">ID: {{ $jugadora->id }}</span>
        </header>

        <div class="card__body">
          <p><strong>Número:</strong> {{ $jugadora->numero ?? '—' }}</p>
          <p><strong>Posición:</strong> {{ $jugadora->posicio ?? '—' }}</p>
          <p>
            <strong>Equip:</strong>
            @if($jugadora->equip)
              <a href="{{ route('equips.show', $jugadora->equip) }}" class="text-blue-600 hover:underline">
                {{ $jugadora->equip->nom }}
              </a>
            @else
              —
            @endif
          </p>
        </div>

        <footer class="card__footer">
          <a class="btn btn--ghost" href="{{ route('jugadoras.show', $jugadora) }}">Ver</a>
          <a class="btn btn--primary" href="{{ route('jugadoras.edit', $jugadora) }}">Editar</a>

          <form method="POST" action="{{ route('jugadoras.destroy', $jugadora) }}" class="inline">
            @csrf
            @method('DELETE')
            <button class="btn btn--danger" type="submit" onclick="return confirm('¿Seguro que quieres eliminar esta jugadora?')">Eliminar</button>
          </form>
        </footer>
      </article>
    @endforeach
  </div>
</div>
@endsection