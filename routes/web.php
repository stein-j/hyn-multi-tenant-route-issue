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
    return view('welcome');
});

// This route
Route::get('/hello', 'HomeController@hello')->name('hello');

// This route simply serves as a test route.
// This should return correctly the full URL of the route.
Route::get('world',function (){
    return route('world');
})->name('world');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
