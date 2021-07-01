<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

//**? ROUTE HOME (liste tous les pokemons) ?**/
$router->get(
    '/',
    [
      'uses' => 'MainController@pokemonList',
      'as'   => 'home'
    ]
);

//**? ROUTE POKEMON DETAIL (caractéristiques d'un pokemon) ?**/
$router->get(
    '/pokemon/{id}',
    [
        'uses' => 'PokemonController@pokemonDetail',
        'as' => 'pokemon'
    ]
);

//**? ROUTE TYPE POKEMON LIST (liste les types de pokémons) ?**/
$router->get(
    '/type',
    [
        'uses' => 'TypeController@typePokemonList',
        'as' => 'type'
    ]
);
