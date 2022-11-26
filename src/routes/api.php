<?php

use App\Http\Controllers\BookController;

$router->group(['prefix' => 'v1'], function () use ($router) {
    $router->get('book', 'BookController@fetchAll');
    $router->post('book', 'BookController@create');
    $router->put('book/{id}', 'BookController@update');
    $router->delete('book/{id}', 'BookController@delete');
});
