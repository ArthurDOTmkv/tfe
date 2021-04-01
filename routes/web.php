<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
    @name : nécessaire pour passer la route en paramètres (form)
*/
/*Routes pour les concerts*/
Route::get('/concerts', 'ConcertController@index')->name('concerts.index');
Route::get('/concerts/{slug}', 'ConcertController@show')->name('concerts.show');
Route::delete('/panier/{rowId}', 'CartController@destroy')->name('cart.destroy');

/*Routes pour le panier*/
Route::get('/panier', 'CartController@index')->name('cart.index');
Route::post('/panier/ajouter', 'CartController@store')->name('cart.store');

/*Routes pour paiement*/
Route::get('/paiement', 'PaiementController@index')->name('paiement.index');