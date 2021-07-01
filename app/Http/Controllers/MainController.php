<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{

  public function pokemonList()
  {

    $pokemonList = Http::get('https://pokeapi.co/api/v2/pokemon?limit=801');
    $pokemonList = json_decode($pokemonList);

    $pokemonSprite = [];

    for($i = 1; $i < 802; $i++) {
        if ($i < 10) {
            $pokemonSprite += [$i - 1 => 'https://raw.githubusercontent.com/HybridShivam/Pokemon/master/assets/images/00'.$i.'.png'];
        } elseif ($i < 100) {
            $pokemonSprite += [$i - 1  => 'https://raw.githubusercontent.com/HybridShivam/Pokemon/master/assets/images/0'.$i.'.png'];
        } else {
            $pokemonSprite += [$i - 1  => 'https://raw.githubusercontent.com/HybridShivam/Pokemon/master/assets/images/'.$i.'.png'];
        }
    }

    return view(
      'home',
      [
        'pokemonList' => $pokemonList->results,
        'pokemonSprite' => $pokemonSprite
      ]
    );
  }
}
