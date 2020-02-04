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


Route::resource('skills','SkillController');
Route::resource('userSkills', 'UserSkillController')->middleware('auth');




Route::get('addComp', 'UserSkillController@create')->middleware('auth');
