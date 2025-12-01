<?php

use Illuminate\Support\Facades\Route;

/*Tipus de crides

Get Route: get-> Des de la URL o clic a un enllaç
Post Route: post-> Des d'un formulari, dades no visibles

Put route: put-> De tipus post, però volem crear un registre
Patch route:: patch-> De tipus post, però volem actualitzar un registre
Delete route:: delete-> De tipus post, peró volem borrar algun registre.

**/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts', function () {
    return view('posts.index');
});

//Jo prefereixo fer-ho com l'any passat
Route::get('/posts/create', function () {
    return view('posts.create');
});

//No es un metode request, es perque a la mateixa vista del create, utilitzem els dos metodes (GET/POST)
/*
Route::match(array('GET','POST')), /posts/create', function(){
    return view('posts.create');
});
*/

Route::get('/posts/{id}/{categgory?}', function ($id, $category = "") {
    return view('posts.view', compact('id', 'category'));
});
