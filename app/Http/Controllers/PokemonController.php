<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class PokemonController extends Controller {

    public function pokemonDetail($id) {

        $pokemon = Http::get('https://pokeapi.co/api/v2/pokemon/'.$id);
        $pokemon = json_decode($pokemon);

        if($id <= 9) {
          $pokemonSprite = 'https://raw.githubusercontent.com/HybridShivam/Pokemon/master/assets/images/00'.$id.'.png';
        } elseif ($id < 100) {
            $pokemonSprite = 'https://raw.githubusercontent.com/HybridShivam/Pokemon/master/assets/images/0'.$id.'.png';
        } else {
            $pokemonSprite = 'https://raw.githubusercontent.com/HybridShivam/Pokemon/master/assets/images/'.$id.'.png';
        }

        $pokemonId = $id;
        $pokemonName = $pokemon->forms;
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
