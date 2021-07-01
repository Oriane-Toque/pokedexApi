<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class PokemonController extends Controller {

    public function pokemonDetail($id) {

        $pokemon = Http::get('https://pokeapi.co/api/v2/pokemon/'.$id);
        $pokemon = json_decode($pokemon);

        $pokemonTypeId = [];

        //? ici je récupère la liste de tous les types de pokemon
        $typeListCompare = Http::get('https://pokeapi.co/api/v2/type');
        $typeListCompare = json_decode($typeListCompare);

        //? ici je récupère les types du pokemon demandé
        $pokemonTypes = $pokemon->types;
        // dd($typeList);

        //? je boucle sur les types de mon pokémon
        foreach($pokemonTypes as $pokemonType) {
            // dd($pokemonType->type->name);
            //? je boucle ensuite sur la liste de tous les types de pokemon
            foreach($typeListCompare->results as $typeIdCompare => $typesCompare) {
                // dd($types->name);
                //? ici je compare si les types de mon pokemon correspond a un des types dans la liste
                if($pokemonType->type->name == $typesCompare->name) {
                    //? si il y a correspondance je récupère la position du type
                    //? afin d'avoir les id correspondant aux types de mon pokemon
                    array_push($pokemonTypeId, $typeIdCompare + 1);
                }
            }
        }


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

        return view('pokemon', [
            'title' => $pokemonName[0]->name,
            'pokemonId' => $pokemonId,
            'pokemonName' => $pokemonName,
            'pokemonSprite' => $pokemonSprite,
            'pokemonStats' => $pokemonStats,
            'pokemonTypes' => $pokemonTypes,
            'pokemonTypeId' => $pokemonTypeId
        ]);
    }
}
