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
    // initialisation d'un tableau pour récupérer les id de pokemons
    $pokemonListId = [];
    // retourne toutes les données des pokemons selon le type renseigné
    $typePokemonsList = Http::get('https://pokeapi.co/api/v2/type/' . $id);
    $typePokemonsList = json_decode($typePokemonsList);
    // retourne le nom du type
    $typeName = $typePokemonsList->name;
    // retourne uniquement la liste des pokemons du type renseigné
    $pokemonsList = $typePokemonsList->pokemon;
    // dd($pokemonsList);

    // récupération de la liste des pokemons dans un but de comparaison
    $pokemonsListCompare = Http::get('https://pokeapi.co/api/v2/pokemon?limit=801');
    $pokemonsListCompare = json_decode($pokemonsListCompare);
    $pokemonsListCompare = $pokemonsListCompare->results;

    // dd($pokemonsList);
    // dd($pokemonsListCompare);

    // initialisation du tableau qui contiendra toutes nos images
    $pokemonSprite = [];

    //! récupération des images pour chaque pokemon
    //! même principe que pour la récupération de l'id de chaque type dans la page pokemon
    foreach ($pokemonsList as $pokemon) {
      // dd($pokemon->pokemon->name);
      foreach ($pokemonsListCompare as $pokemonIdCompare => $pokemonCompare) {
        // dd($pokemonCompare->name);
        if ($pokemon->pokemon->name == $pokemonCompare->name) {
          $pokemonIdCompare = $pokemonIdCompare + 1;

          // et on récupère au passage l'id des pokemons
          array_push($pokemonListId, $pokemonIdCompare);

          if ($pokemonIdCompare < 10) {

            array_push($pokemonSprite, 'https://raw.githubusercontent.com/HybridShivam/Pokemon/master/assets/images/00' . $pokemonIdCompare . '.png');
          } elseif ($pokemonIdCompare < 100) {

            array_push($pokemonSprite, 'https://raw.githubusercontent.com/HybridShivam/Pokemon/master/assets/images/0' . $pokemonIdCompare . '.png');
          } else {

            array_push($pokemonSprite, 'https://raw.githubusercontent.com/HybridShivam/Pokemon/master/assets/images/' . $pokemonIdCompare . '.png');
          }
        }
      }
    }

    // dd($pokemonSprite);
    // dd($pokemonsList);

    return view('type-pokemons-list',
      [
        'title' => $typeName,
        'pokemonsList' => $pokemonsList,
        'pokemonSprite' => $pokemonSprite,
        'pokemonListId' => $pokemonListId
      ]
    );
  }
}
