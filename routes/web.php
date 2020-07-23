<?php

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
$router->get('/', function(){
    return "Página inicial";
});

$router->get('/{id}', ['uses' => 'ShortController@index']);
$router->post('/users', ['uses' => 'ShortController@createUser']);
$router->post('/users/{id}/urls', ['uses' => 'ShortController@index']);
$router->delete('/urls/{id}', ['uses' => 'ShortController@index']);
// $router->get('/stats', ['uses' => 'ShortController@index']);
