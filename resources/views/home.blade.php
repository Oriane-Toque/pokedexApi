@extends('template.master')

@section('content')

  <section class="pokemonList">

    @foreach($pokemonList as $pokemonId => $pokemonItem)
    <div class="pokemonList_pokemon">
      <a href="{{ @route("pokemon", ["id" => $pokemonId + 1 ]) }}">
        <p><span>#{{ $pokemonId + 1 }}</span> {{ $pokemonItem->name }}</p>
      </a>
    </div>
    @endforeach

  </section>

@endsection
