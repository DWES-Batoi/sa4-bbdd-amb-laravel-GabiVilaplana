@extends('layouts.equip')

@section('content')
<div class="container">
  <h1 class="title">{{ __('Listado de jugadoras') }}</h1>

  <p class="mb-4">
    <a href="{{ route('jugadoras.create') }}" class="btn btn--primary">{{ __('Nueva jugadora') }}</a>
  </p>

  <div class="grid-cards">
    @foreach ($jugadoras as $jugadora)
      <article class="card">
        <header class="card__header">
          <h2 class="card__title">{{ $jugadora->nom }} {{ $jugadora->cognom }}</h2>
          <span class="card__badge">{{ __('ID') }}: {{ $jugadora->id }}</span>
        </header>

        <div class="card__body">
          <p><strong>{{ __('Número') }}:</strong> {{ $jugadora->numero ?? '—' }}</p>
          <p><strong>{{ __('Posición') }}:</strong> {{ $jugadora->posicio ?? '—' }}</p>
          <p>
            <strong>{{ __('Equip') }}:</strong>
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
          <a class="btn btn--ghost" href="{{ route('jugadoras.show', $jugadora) }}">{{ __('Ver') }}</a>
          <a class="btn btn--primary" href="{{ route('jugadoras.edit', $jugadora) }}">{{ __('Editar') }}</a>

          <form method="POST" action="{{ route('jugadoras.destroy', $jugadora) }}" class="inline"
                onsubmit="return confirm('{{ __('¿Seguro que quieres eliminar esta jugadora?') }}');">
            @csrf
            @method('DELETE')
            <button class="btn btn--danger" type="submit">{{ __('Eliminar') }}</button>
          </form>
        </footer>
      </article>
    @endforeach
  </div>
</div>
@endsection