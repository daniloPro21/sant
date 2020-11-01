<?php

use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/login/facebook', 'Auth\LoginController@redirectToProvider')->name('facebook');
Route::get('/login/facebook/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('login/google', 'Auth\LoginController@googleredirectToProvider')->name('google');
Route::get('login/google/callback', 'Auth\LoginController@googlehandleProviderCallback');

Route::group(['middleware' => 'auth'], function () {
    Route::get('profile', 'ProfileController@index')->name('prodil.index');
    Route::get('/profile/edit', 'ProfileController@profile')->name('profile.edit');
    Route::get('/profile/update', 'ProfileController@update')->name('profile.update');
    Route::patch('ajour', 'ProfileController@updated')->name('profile.updated');
    Route::post('/profile/save', 'ProfileController@store')->name('profile.store');
    Route::delete('/delete/{id}', 'ProfileController@delete')->name('profile.delete');
});


Route::group(['middleware' => 'auth'], function () {
    Route::get('doctor', 'AppointmentController@index')->name('rdv.index');
    Route::post('save/rdv', 'AppointmentController@save')->name('rdv.save');
    Route::patch('rdv/eidt/{id}', 'AppointmentController@changestatus')->name('rdv.status');
});
