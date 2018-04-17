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

Route::get('get-balance/{address?}', function($address = null){
    if($address)
        return json_encode(LaraBlockIo::getAddressesBalanceByAddress($address));
    else
        return json_encode(LaraBlockIo::getBalanceInfo());
});

Route::get('/game','TambolaController@gamepage');
Route::get('/game-feeder','TambolaController@game');

Route::get('doge', 'DogeController@create');