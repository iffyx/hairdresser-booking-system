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

Route::get('/admin', function () {
    return view('auth/login');
})->middleware('guest');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/price-list', 'ServiceController@priceList')->name('price-list');
Route::get('/create-reservation', 'ReservationController@createReservation')->name('create-reservation');
Route::post('customerReservation', ['as' => 'customerReservation', 'uses' => 'ReservationController@store2']);

Route::resource('services','ServiceController')->middleware('auth');
Route::resource('reservations','ReservationController')->middleware('auth');
