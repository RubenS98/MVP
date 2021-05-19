<?php

use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});

Route::get('/colors', function () {
    return view('palette.create');
    #return view('/auth.login');
});

Route::get('paletteCreate', 'PaletteController@create')
    ->name('palette.create');

Route::get('paletteIndex', 'PaletteController@index')
    ->name('palette.index');

Route::post('paletteStore', 'PaletteController@store')
    ->name('palette.store');

Route::get('paletteEdit/{palette}', 'PaletteController@edit')
    ->name('palette.edit');

Route::get('paletteShow/{palette}', 'PaletteController@show')
    ->name('palette.show');

Route::post('paletteUpdate/{palette}', 'PaletteController@update')
    ->name('palette.update');

Route::delete('paletteDelete/{palette}', 'PaletteController@destroy')
    ->name('palette.delete');

Route::get('register', 'AuthController@register')->name('auth.register');
Route::post('register', 'AuthController@doRegister')
    ->name('auth.do-register');
Route::get('login', 'AuthController@login')
    ->name('auth.login');
Route::post('login', 'AuthController@doLogin')
    ->name('auth.do-login');
Route::any('logout', 'AuthController@logout')->name('auth.logout');