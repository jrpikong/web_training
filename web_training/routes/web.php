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

Route::get('/', 'WelcomeController@index')->name('welcome');
Route::get('/faq', 'WelcomeController@faq')->name('faq');
Route::get('/about-us', 'WelcomeController@aboutUs')->name('aboutUs');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/products', 'ProductController@getAll')->name('products');
Route::get('/products/{id}', 'ProductController@getDetailProduct')->name('product_detail');
Route::get('/term_and_condition', 'HomeController@term_and_condition')->name('term_and_condition');
Route::post('/term_and_condition_pos', 'HomeController@term_and_condition_post')->name('term_and_condition_pos');
Route::put('/update_bank_account/{id}', 'HomeController@updateBankAccount')->name('update_bank_account');

Route::middleware(['auth'])->group(function () {
    Route::prefix('/admin')->group(function () {
        Route::get('/members', 'MemberController@index')->name('admin_members');
        Route::get('/get_members', 'MemberController@getMember');
        Route::get('/get_member/{id}', 'MemberController@getMemberByID');
        Route::get('/sliders', 'SliderController@index')->name('admin_sliders');


        /*Quize*/
        Route::get('/list_quiz', 'QuizController@index')->name('list_quiz');
        Route::get('/add_quiz', 'QuizController@form')->name('add_quiz');
        Route::post('/post_quiz', 'QuizController@submitSoal')->name('post_quiz');

        /*Product*/
        Route::get('/list_product', 'ProductController@index')->name('list_product');
        Route::delete('/delete_product/{id}', 'ProductController@destroy')->name('delete_product');
        Route::get('/add_product', 'ProductController@add')->name('add_product');
        Route::get('/edit_product/{id}', 'ProductController@edit')->name('edit_product');
        Route::put('/update_product/{id}', 'ProductController@update')->name('update_product');
        Route::get('/get_product/{id}', 'ProductController@getProduct')->name('get_product');
        Route::post('/post_product', 'ProductController@store')->name('post_product');
        Route::get('/get_product_categories', 'ProductController@getCategories')->name('get_product_categories');

    });
});

Route::middleware(['auth'])->group(function () {
    Route::get('/start_quiz','QuizController@startQuiz')->name('start_quiz');
    Route::get('/get_quiz','QuizController@getQiz')->name('get_quiz');
    Route::post('/post_personal_quiz','QuizController@postPersonalQuiz')->name('post_personal_quiz');
    Route::get('/trainings', 'TrainingController@getTraining')->name('trainings');
    Route::get('/history_training', 'TrainingQuizResultController@historyTraining')->name('history_training');
    Route::get('/add_training', 'TrainingController@addTraining')->name('add_training');
    Route::post('/submit_training', 'TrainingController@submitTraining')->name('submit_training');
    Route::get('/add_quiz_training/{id_training}', 'TrainingQuizController@AddQuizTraining')->name('add_quiz_training');
    Route::post('/submit_quiz_training', 'TrainingQuizController@SubmitQuizTraining')->name('submit_quiz_training');
    Route::get('/training/{id}', 'TrainingController@edit')->name('edit_training');
    Route::get('/edit_quiz/{id}', 'TrainingQuizController@edit')->name('edit_quiz');
    Route::patch('/update_training/{id}', 'TrainingController@update')->name('update_training');
    Route::delete('/training/{id}', 'TrainingController@destroy')->name('delete_training');

    Route::get('/follow_training/{id}', 'TrainingController@FollowTraining')->name('follow_training');
    Route::get('/follow_test/{id}', 'TrainingQuizController@FollowTest')->name('follow_test');
    Route::get('/get_training_quiz/{id}', 'TrainingQuizController@getTrainingQuiz')->name('get_training_quiz');
    Route::post('/post_quiz', 'TrainingQuizController@postQuiz')->name('post_quiz');
});

Route::post('uploadFile', 'ProductController@uploadMedia');