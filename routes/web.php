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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/price-list', 'ServiceController@priceList')->name('price-list');
Route::get('/create-reservation', 'ReservationController@createReservation')->name('create-reservation');
Route::post('store2', ['as' => 'store2', 'uses' => 'ReservationController@store2']);
/*Route::resource('services','ServiceController');
Route::resource('reservations','ReservationController');*/

//Route::group(['middleware' => ['auth', 'Admin']], function() {

    Route::resource('services','ServiceController')->middleware('auth');
    Route::resource('reservations','ReservationController')->middleware('auth');
//});
//Route::post('reservation', ['as' => 'reservation', 'uses' => 'ReservationController@store']);