@extends('template.master')

@section('content')

<section class="listTypes">
  <h2>Cliquez sur un type pour voir tous les Pokemons de ce type</h2>
  @foreach($typeList as $typeId => $type)
  <div>
    <a href="{{ @route("type-pokemons-list", ["id" => $typeId + 1]) }}">
      <p class="{{ $type->name }}">{{ $type->name }}</p>
    </a>
  </div>
  @endforeach
</section>

@endsection
