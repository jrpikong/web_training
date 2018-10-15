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
Route::get('/term_and_condition', 'HomeController@term_and_condition')->name('term_and_condition');
Route::post('/term_and_condition_pos', 'HomeController@term_and_condition_post')->name('term_and_condition_pos');
