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

Route::get('getdata/{id}', 'CvController@getData');

//Experiences experiences
Route::get('getexperiences/{id}', 'CvController@getExperiences');
Route::post('/addexperience', 'CvController@addExperiences');
Route::put('/updateexperience', 'CvController@updateExperiences');
Route::put('/deleteexperience/{id}', 'CvController@deleteExperiences');


// Ausbildung ausbildung
Route::get('getausbildungs/{id}', 'CvController@getAusbildungs');
Route::post('/addausbildung', 'CvController@addAusbildung');
Route::put('/updateausbildung', 'CvController@updateAusbildung');
Route::put('/deleteausbildung/{id}', 'CvController@deleteAusbildung');


//Project project
Route::post('/addproject', 'CvController@addProject');
Route::put('/updateproject', 'CvController@updateProject');
Route::put('/deleteproject/{id}', 'CvController@deleteProject');

//Portfolio portfolio
Route::post('/addportfolio', 'CvController@addPortfolio');
Route::put('/updateportfolio', 'CvController@updatePortfolio');
Route::put('/deleteportfolio/{id}', 'CvController@deletePortfolio');

// Kompetenenz kompetenenz
Route::post('/addkompetenenz', 'CvController@addKompetenenz');
Route::put('/updatekompetenenz', 'CvController@updateKompetenenz');
Route::put('/deletekompetenenz/{id}', 'CvController@deleteKompetenenz');


