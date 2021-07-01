@extends('template.master')

@dump($typePokemonsList)

@section('content')
<section class="pokemonList">
  <div class="pokemonList_pokemon">
    <a href="pokemon/id">
      <img src="POKEMON IMAGE" alt="POKEMON NOM">
      <p><span>#POKEMON NUMERO</span> POKEMON NOM</p>
    </a>
  </div>
</section>
@endsection
