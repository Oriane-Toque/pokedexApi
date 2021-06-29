<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class PokemonController extends Controller {

    public function pokemonDetail($id) {

        $pokemon = Http::get('https://pokeapi.co/api/v2/pokemon/'.$id);
        $pokemon = json_decode($pokemon);

        $pokemonId = $id;
        $pokemonName = $pokemon->forms;
        $pokemonSprite = $pokemon->sprites->front_default;
        $pokemonStats = $pokemon->stats;
        $pokemonTypes = $pokemon->types;

        return view('pokemon', [
            'pokemonId' => $pokemonId,
            'pokemonName' => $pokemonName,
            'pokemonSprite' => $pokemonSprite,
            'pokemonStats' => $pokemonStats,
            'pokemonTypes' => $pokemonTypes
        ]);
    }
}
