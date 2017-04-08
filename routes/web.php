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

Route::post('/register', [
	'uses' => 'HomesController@register',
	'as' => 'app.post.register'
]);

Route::post('/login', [
    'uses' => 'HomesController@login',
    'as' => 'app.post.login'
]);

Route::post('/logout', [
    'uses' => 'AuthsController@logout',
    'as' => 'app.post.logout'
]);

/** Dealer Department */
Route::group(['prefix' => 'dealer'], function () {
    Route::get('/dashboard', [
        'uses' => 'DealersController@adashboard',
        'as' => 'dealer.get.dashboard'
    ]);
});