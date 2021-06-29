@extends('template.master')


@section('content')

  <section class="pokemonList">

    @foreach($pokemonsList as $pokemonId => $pokemonItem)
    <div class="pokemonList_pokemon">
      <a href=" {{ @route("pokemon.detail", ["id" => $pokemonId ]) }}">
        <img src="{{ $pokemonItem->sprites->front_default }}" alt="{{ $pokemonItem->name }}">
        <p><span>#{{ $pokemonId }}</span> {{ $pokemonItem->name }}</p>
      </a>
    </div>
    @endforeach

  </section>

@endsection
