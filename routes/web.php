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

Route::get('/', [
    'uses' => 'dashboardController@home',
    'as' => 'home.dashboard'
])->middleware('auth');


//------------ dashboard ---------------

Route::get('/dashboard', [
    'uses' => 'dashboardController@home',
    'as' => 'home.dashboard'
])->middleware('auth');

//----------- types -------------------

Route::get('/types', [
    'uses' => 'stockController@allTypes',
    'as' => 'home.types'
])->middleware('auth');

Route::get('type/{id}',[
    'uses' => 'stockController@single_type',
    'as' => 'single.type'
])->middleware('auth');

Route::post('/types', [
    'uses' => 'stockController@postTypes',
    'as' => 'post.types'
])->middleware('auth');

//----------- Les entrees ---------------

Route::get('/entres', [
    'uses' => 'stockController@showEntres',
    'as' => 'show.entres'
])->middleware('auth');

// add entres

Route::get('/entres/add',[
    'uses' => 'stockController@getAddEntres',
    'as' => 'add.entres'
])->middleware('auth');

Route::post('/entres/add',[
    'uses' => 'stockController@postEntres',
    'as' => 'post.entres'
])->middleware('auth');

//edit entres

Route::get('entres/edit/{id}',[
    'uses' => 'stockController@editEntres',
    'as' => 'edit.entres'
])->middleware('auth');

Route::post('entres/edit/{id}',[
    'uses' => 'stockController@postEditEntres',
    'as' => 'post.edit.entres'
])->middleware('auth');

// remove entres

Route::get('entres/delete/{id}',[
    'uses' => 'stockController@deleteEntres',
    'as' => 'delete.entres'
])->middleware('auth');


//--------- Les sorties --------------------

Route::get('/sorties',[
    'uses' => 'stockController@showSorties',
    'as' => 'show.sorties'
])->middleware('auth');

Route::get('/sorties/add', [
    'uses' => 'stockController@addSorties',
    'as' => 'add.sorties'
])->middleware('auth');

Route::post('/sorties/add', [
    'uses' => 'stockController@postSorties',
    'as' => 'post.sorties'
])->middleware('auth');

//edit sortie

Route::get('/sorties/edit/{id}',[
    'uses' => 'stockController@editSorties',
    'as' => 'edit.sorties'
])->middleware('auth');

Route::post('sorties/edit/{id}',[
    'uses' => 'stockController@postEditSorties',
    'as' => 'post.edit.sorties'
])->middleware('auth');

// remove sortie

Route::get('sorties/delete/{id}',[
    'uses' => 'stockController@deleteSorties',
    'as' => 'delete.sorties'
])->middleware('auth');


//----------- Generation ----------------


Route::get('/generation',[
    'uses' => 'stockController@generation_page',
    'as' => 'home.generation'
])->middleware('auth');

Route::get('generation/edit/{id}',[
    'uses' => 'stockController@editGeneration',
    'as' => 'edit.generation'
])->middleware('auth');

Route::post('generation/edit/{id}',[
    'uses' => 'stockController@postEditGeneration',
    'as' => 'post.edit.generation'
])->middleware('auth');

Route::get('generation/delete/{id}',[
    'uses' => 'stockController@deleteGeneration',
    'as' => 'delete.generation'
])->middleware('auth');

Route::get('logout', function (){
    Auth::logout();
    return redirect()->route('login');
})->name('get_logout');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
