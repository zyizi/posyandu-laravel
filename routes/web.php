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
Route::group(['namespace' => 'App\Http\Controllers'], function() {
    /**
     * Home Routes
     */
    Route::get('/', 'HomeController@index')->name('home.index');

    Route::group(['middleware' => ['guest']], function () {
        /**
         * Register Routes
         */
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');

        /**
         * Login Routes
         */
        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');

    });
    Route::post('/ukurtimbangan', 'TimbanganController@store')->name('timbangan.store');
    Route::get('/timbang', 'TimbanganController@create')->name('timbangan.create');
    Route::get('/getTinggi', 'TimbanganController@getTinggi')->name('getTinggi');
    Route::group(['middleware' => ['auth']], function () {
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
        Route::get('/create', 'BalitaController@create')->name('create');
        Route::post('/balita', 'BalitaController@store')->name('store');
        Route::get('/pengukuran', 'BalitaController@createPengukuran')->name('pengukuran');
        Route::get('/get-nama-ibu/{nama_balita}', 'BalitaController@getNamaIbu');
        Route::post('/store', 'BalitaController@storePengukuran')->name('pengukuran.store');
        Route::get('/riwayat', 'BalitaController@showHistory')->name('showHistory');

    });
    });
