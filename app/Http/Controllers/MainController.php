<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{

  public function pokemonList()
  {

    $pokemonList = Http::get('https://pokeapi.co/api/v2/pokemon?limit=898');
    $pokemonList = json_decode($pokemonList);

    return view(
      'home',
      [
        'pokemonList' => $pokemonList->results
      ]
    );
  }
}
