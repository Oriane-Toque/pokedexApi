@extends('template.master')

@section('content')

  <h2>Liste de tous les pokemons</h2>

  <section class="pokemonList">

    @foreach($pokemonList as $pokemonId => $pokemonItem)
    <div class="pokemonList_pokemon">
      <a href="{{ @route("pokemon", ["id" => $pokemonId + 1 ]) }}">
        <h2><span>#{{ $pokemonId + 1 }}</span> {{ $pokemonItem->name }}</h2>
      </a>
    </div>
    @endforeach

  </section>

@endsection
