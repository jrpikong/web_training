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

Route::prefix('/admin')->group(function () {
    Route::get('/members', 'MemberController@index')->name('admin_members');
    Route::get('/get_members', 'MemberController@getMember');
    Route::get('/get_member/{id}', 'MemberController@getMemberByID');
    Route::get('/sliders','SliderController@index')->name('admin_sliders');


    /*Quize*/
    Route::get('list_quiz','QuizController@index')->name('list_quiz');
    Route::get('add_quiz','QuizController@form')->name('add_quiz');
    Route::post('post_quiz','QuizController@submitSoal')->name('post_quiz');

});