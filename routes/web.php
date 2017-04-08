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


/** Home Login Page */
Route::get('/', function () {
	// dd(bcrypt('123'));
    return view('home');
})->name('app.get.home');

// Route::post('/register', [
// 	'uses' => 'HomesController@register',
// 	'as' => 'app.post.register'
// ]);

Route::post('/login', [
    'uses' => 'HomesController@login',
    'as' => 'app.post.login'
]);

Route::post('/logout', [
    'uses' => 'HomesController@logout',
    'as' => 'app.post.logout'
]);

/** Dealer Department */
Route::group(['prefix' => 'dealer'], function () {
    
    Route::get('dashboard', [
        'uses' => 'DealersController@dashboard',
        'as' => 'dealer.get.dashboard'
    ]);

    Route::get('new-client', [
        'uses' => 'DealersController@newClient',
        'as' => 'dealer.get.newClient'
    ]);

    Route::post('add-client', [
        'uses' => 'DealersController@addClient',
        'as' => 'dealer.post.addClient'
    ]);

    Route::get('encrypt', [
        'uses' => 'DealersController@encrypt',
        'as' => 'dealer.get.encrypt'
    ]);


    Route::delete('delete-client/{id}', [
        'uses' => 'DealersController@deleteClient',
        'as' => 'dealer.delete.deleteClient'
    ]);
});