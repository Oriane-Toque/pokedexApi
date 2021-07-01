@extends('template.master')


@section('content')

<section class="pokemon">
  <h2>Détails de {{ $pokemonName[0]->name }}</h2>
  <div class="pokemonDescription">
    <aside>
      <img src="{{ $pokemonSprite }}" alt="{{ $pokemonName[0]->name }}">
    </aside>
    <article>
      <h3>#{{ $pokemonId }} {{ $pokemonName[0]->name }}</h3>
      <!-- TYPES DU POKEMON -->

      @foreach($pokemonTypes as $typeKey => $pokemonType)
      <div class="pokemonType">
        <a href="{{ @route("type", ["id" => $pokemonTypeId[$typeKey] ]) }}">
            <p><span class="{{ $pokemonType->type->name }}">{{ $pokemonType->type->name }}</span></p>
        </a>
      </div>
      @endforeach
      <!-- STATS DU POKEMON -->
      <div class="pokemonStats">
        <!-- PV POKEMON -->
        <div>
          <label for="pv">PV<span>{{$pokemonStats[0]->base_stat}}</span></label>
          <div class="progress">
            <div role="progressbar" style="width: {{$pokemonStats[0]->base_stat * 100 / 255}}%;"></div>
          </div>
        </div>

        <!-- ATTAQUE POKEMON -->
        <div>
          <label for="attack">Attaque<span> {{$pokemonStats[1]->base_stat}}</span></label>
          <div class="progress">
            <div role="progressbar" style="width: {{$pokemonStats[1]->base_stat * 100 / 255}}%;">
            </div>
          </div>
        </div>

        <!-- DEFENSE POKEMON -->
        <div>
          <label for="defense">Défense<span> {{$pokemonStats[2]->base_stat}}</span></label>
          <div class="progress">
            <div role="progressbar" style="width: {{$pokemonStats[2]->base_stat * 100 / 255}}%;">
            </div>
          </div>
        </div>

        <!-- ATTAQUE SPÉCIALE -->
        <div>
          <label for="attackSpe">Attaque
            Spé.<span> {{$pokemonStats[3]->base_stat}}</span></label>
          <div class="progress">
            <div role="progressbar" style="width: {{$pokemonStats[3]->base_stat * 100 / 255}}%;"></div>
          </div>
        </div>

        <!-- DEFENSE SPÉCIALE -->
        <div>
          <label for="defenseSpe">Défense
            Spé.<span> {{$pokemonStats[4]->base_stat}}</span></label>
          <div class="progress">
            <div role="progressbar" style="width: {{$pokemonStats[4]->base_stat * 100 / 255}}%;"></div>
          </div>
        </div>

        <!-- VITESSE -->
        <div>
          <label for="speed">Vitesse<span> {{$pokemonStats[5]->base_stat}}</span></label>
          <div class="progress">
            <div role="progressbar" style="width: {{$pokemonStats[5]->base_stat * 100 / 255}}%;">
            </div>
          </div>
        </div>

      </div>
    </article>
  </div>
  <p class="pokemonBackHome" role="back to home page">
    <a href="{{ @route('home') }}">Revenir à la liste</a>
  </p>
</section>

@endsection
