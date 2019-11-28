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
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/animals', 'AnimalController@show')->name('animals');
Route::get('/races', 'RaceController@showrace')->name('races');
Route::get('/users', 'UserController@showuser')->name('users');


Route::middleware('auth')->group(function () {

    // Animal
    Route::get('/animals/create', 'AnimalController@create')->name('create');
    Route::get('/animal/edit/{id}', 'AnimalController@edit')->name('edit');

    Route::post('/animal/store', 'AnimalController@store')->name('store');
    Route::post('/animal/update/{id}', 'AnimalController@update')->name('update');
    Route::post('/animal/delete/{id}', 'AnimalController@delete')->name('delete');

    // Race 
    Route::get('/races/createrace', 'RaceController@createrace')->name('createrace');
    Route::get('/race/edit/{id}', 'RaceController@editrace')->name('editrace');
    
    Route::post('/race/storerace', 'RaceController@storerace')->name('storerace');
    Route::post('/race/update/{id}', 'RaceController@updaterace')->name('updaterace');
    Route::post('/race/delete/{id}', 'RaceController@deleterace')->name('deleterace');

    // User
    Route::get('/users/createuser', 'UserController@createuser')->name('createuser');
    Route::get('/user/edit/{id}', 'UserController@edituser')->name('edituser');

    Route::post('/user/store', 'UserController@storeuser')->name('storeuser');
    Route::post('/user/update/{id}', 'UserController@updateuser')->name('updateuser');
    Route::post('/user/delete/{id}', 'UserController@deleteuser')->name('deleteuser');
    
});