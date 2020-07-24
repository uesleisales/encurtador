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

$router->get('/stats', ['uses' => 'StatsController@getAllStats']);
$router->get('/{id}', ['uses' => 'UrlController@index']);
$router->get('/users/{id}/stats', ['uses' => 'StatsController@getUserUrlStats']);
$router->get('/stats/{id}', ['uses' => 'StatsController@getUrlStats']);

$router->post('/users', ['middleware' => 'return-json', 'uses' => 'UserController@createUser']);
$router->delete('/users/{id}', ['middleware' => 'return-json', 'uses' => 'UserController@delete']);
$router->post('/users/{id}/urls', ['middleware' => 'return-json', 'uses' => 'UrlController@createUrl']);
$router->delete('/urls/{id}', ['middleware' => 'return-json', 'uses' => 'UrlController@delete']);

