<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use DB;

class TypeController extends Controller {

    public function typePokemonList() {
      // TODO
      $typeList = Http::get('https://pokeapi.co/api/v2/type');
      $typeList = json_decode($typeList);

      return view('type',
        [
          'title' => 'Types de Pokemon',
          'typeList' => $typeList->results
        ]
      );
    }
}
