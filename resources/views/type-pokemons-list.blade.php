@extends('template.master')


@section('content')

<section class="pokemonList">

@foreach($pokemonsList as $pokemonId => $pokemonItem)
    @if(array_key_exists($pokemonId, $pokemonSprite))
        <div class="pokemonList_pokemon">
        <a href="{{ @route("pokemon", ["id" => $pokemonListId[$pokemonId] ]) }}">
            <img src="{{$pokemonSprite[$pokemonId]}}" alt="Nom du pokemon"/>
            <p><span>#{{ $pokemonListId[$pokemonId] }}</span> {{ $pokemonItem->pokemon->name }}</p>
        </a>
        </div>
    @endif
@endforeach

</section>

@endsection
