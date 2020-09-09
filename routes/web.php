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
Route::middleware(['auth'])->group(function () {
    Route::get('/', 'MembersController@index');
    Route::resource('reservoirs', 'ReservoirsController');
    Route::resource('members', 'MembersController');
    Route::get('members/{id}/travel', 'MembersController@travel')->name('members.travel');
});



Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');