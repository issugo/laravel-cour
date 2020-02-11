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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('hello', function () {
    return "hello";
});

Route::get('userCompetences', 'UserController@all')->name('userCompetences');

Route::get('myComp', 'UserController@index')->name('myComp')->middleware('auth');

Route::match(['get', 'post'], 'ajouterCompetence', 'UserController@newComp')->name('ajouterCompetence')->middleware('auth');

Route::get('deleteComp/{compName}', 'UserController@deleteComp')->where('compName', '[A-Za-z]+')->middleware('auth');

Route::get('/home', 'HomeController@index')->name('home');


//route du crud skills
Route::resource('skills','SkillController')->middleware('admin');

//route du crud userSkills
Route::resource('userSkills', 'UserSkillController')->middleware('auth');

//route pour afficher les users et filtrage
Route::get('/filtrage', 'UserSkillController@filtrage');
Route::post('/filtrage', 'UserSkillController@withFiltrage');

//route du chat
Route::get('/chat', 'ChatsController@index');
Route::get('messages', 'ChatsController@fetchMessages');
Route::post('messages', 'ChatsController@sendMessage');
