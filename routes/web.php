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
    return view('auth.login');
});



Route::resource('cvs', 'CvController');
/*
Route::get('cvs', 'CvController@index');
Route::get('cvs/create', 'CvController@create');
Route::post('cvs', 'CvController@store');
Route::get('cvs/{id}/edit', 'CvController@edit');
Route::put('cvs{id}', 'CvController@update');
Route::delete('cvs/{id}', 'CvController@destroy');
Route::get('cvs/{id}', 'CvController@show');
*/




Route::get('cv/experience/create/{id}', 'CvController@cvExperienceCreate');
Route::get('cv/experience/show/{id}', 'CvController@cvExperienceShow');

Route::get('experience/{id}', 'ExperienceController@create');


Auth::routes();

Route::get('/home', 'HomeController@index');
