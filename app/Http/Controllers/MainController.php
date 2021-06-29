<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class MainController extends Controller {

  public function pokemonList() {
    $pokemonsList = [];

    for($i = 1; $i < 100; $i++) {
        $pokemonsSprite = Http::get('https://pokeapi.co/api/v2/pokemon-form/'.$i);

        $pokemonsList += [$i => json_decode($pokemonsSprite)];
    }

    return view('home', [
        'pokemonsList' => $pokemonsList
        ]
    );
  }
}
