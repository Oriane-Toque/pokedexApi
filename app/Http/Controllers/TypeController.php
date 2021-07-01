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
    //? je boucle sur ma liste de pokemons par type
    foreach ($pokemonsList as $pokemon) {
      // dd($pokemon->pokemon->name);
      //? je boucle sur la liste de tous les pokemons
      foreach ($pokemonsListCompare as $pokemonIdCompare => $pokemonCompare) {
        // dd($pokemonCompare->name);
        //? je compare les deux listes: si il y a une correspondance
        if ($pokemon->pokemon->name == $pokemonCompare->name) {
          //? alors j'incrémente de 1 l'id (un tableau commence à 0, nous on a besoin qu'il commence à 1)
          $pokemonIdCompare = $pokemonIdCompare + 1;

          // et on récupère au passage l'id des pokemons
          //? je stocke l'id du pokemon pour pouvoir l'indiquer dans ma vue
          array_push($pokemonListId, $pokemonIdCompare);

          //? je stocke l'image du pokemon correspondant à l'id
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
