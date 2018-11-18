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

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'ProfileController@edit')->name('profile.edit');
Route::put('/profile/update', 'ProfileController@update')->name('profile.update');
Route::get('/bank-cards', 'CardController@bankCards')->name('bank.cards');
Route::get('/bank-add-card', 'CardController@addCard')->name('bank.add-cards');
Route::post('/bank-add-card', 'CardController@storeCard')->name('bank.add-card');
Route::get('/account-verification', 'AccountVerificationController@index')->name('verification.index');
Route::post('/account-verification/phone', 'AccountVerificationController@phoneVerification')->name('verification.phone');
Route::post('/account-verification/bvn', 'AccountVerificationController@bvnVerification')->name('verification.bvn');
Route::get('/account-blocked', 'ProfileController@blockedAccount')->name('account.blocked');
Route::prefix('admin')->group(function() {
    Route::get('/dashboard', 'Admin\DashboardController@dashboard')->name('admin.dashboard');
    Route::get('/users', 'Admin\UserController@index')->name('admin.users.index');
    Route::get('/users/profile/{username}', 'Admin\UserController@getProfile')->name('admin.users.profile');
    Route::put('/users/profile/block-account', 'Admin\UserController@blockAccount')->name('admin.users.profile.block');
    Route::put('/users/profile/unblock-account', 'Admin\UserController@unblockAccount')->name('admin.users.profile.unblock');
    Route::delete('/users/profile/delete', 'Admin\UserController@deleteAccount')->name('admin.users.profile.delete');
});