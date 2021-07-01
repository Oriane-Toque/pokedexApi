<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use DB;

class TypeController extends Controller
{

  public function typeList()
  {

    $typeList = Http::get('https://pokeapi.co/api/v2/type');
    $typeList = json_decode($typeList);

    return view(
      'type',
      [
        'title' => 'Types de Pokemon',
        'typeList' => $typeList->results
      ]
    );
  }

  public function typePokemonList($id)
  {

    $typePokemonsList = Http::get('https://pokeapi.co/api/v2/type/' . $id);
    $typePokemonsList = json_decode($typePokemonsList);
    $typePokemonsList = $typePokemonsList->pokemon;

    $pokemonsListCompare = Http::get('https://pokeapi.co/api/v2/pokemon?limit=801');
    $pokemonsListCompare = json_decode($pokemonsListCompare);
    $pokemonsListCompare = $pokemonsListCompare->results;

    // dd($typePokemonsList);
    // dd($pokemonsListCompare);

    $pokemonSprite = [];

    //! récupération des images pour chaque pokemon
    //! même principe que pour la récupération de l'id de chaque type dans la page pokemon
    foreach ($typePokemonsList as $typePokemon) {
      // dd($typePokemon->pokemon->name);
      foreach ($pokemonsListCompare as $pokemonId => $pokemonCompare) {
        // dd($pokemonCompare->name);
        if ($typePokemon->pokemon->name == $pokemonCompare->name) {
          $pokemonId = $pokemonId + 1;

          if ($pokemonId < 10) {

            array_push($pokemonSprite, 'https://raw.githubusercontent.com/HybridShivam/Pokemon/master/assets/images/00' . $pokemonId . '.png');
          } elseif ($pokemonId < 100) {

            array_push($pokemonSprite, 'https://raw.githubusercontent.com/HybridShivam/Pokemon/master/assets/images/0' . $pokemonId . '.png');
          } else {

            array_push($pokemonSprite, 'https://raw.githubusercontent.com/HybridShivam/Pokemon/master/assets/images/' . $pokemonId . '.png');
          }
        }
      }
    }

    // dd($pokemonSprite);
    // dd($typePokemonsList);

    return view('typepokemonslist',
      [
        'typePokemonsList' => $typePokemonsList,
        'pokemonSprite' => $pokemonSprite
      ]
    );
  }
}
