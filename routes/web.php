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
//
// Route::get('/', function () {
//     return view('welcome');
// });

//////////////////////////////////////////////////////////////////////////////
///////////////////////           FRONT         //////////////////////////////
//////////////////////////////////////////////////////////////////////////////
Route::group(['namespace' => 'Front'], function () {
  Route::get('/', 'HomeController@index')->name('home');
  Route::get('/profile', 'HomeController@profile')->name('profile');
  Route::get('/single', 'HomeController@single')->name('single');
});

//////////////////////////////////////////////////////////////////////////////
///////////////////////           BACK          //////////////////////////////
//////////////////////////////////////////////////////////////////////////////
Route::group(['namespace' => 'Back'], function () {
  Route::get('/dashboard', 'DashboardController@dashboard')->name('dashboard');

  Route::get('/dashboard/liste-films', 'DashboardController@movieslist')->name('movieslist');

  Route::get('/modifier-film/{id}', 'DashboardController@modifierfilm')->where('id','[0-9]+')->name('modifierfilm');
  Route::put('/modifier-film/{id}', 'DashboardController@modifierfilmaction')->where('id','[0-9]+')->name('modifierfilm-action');
  Route::delete('/supprimer-film/{id}', 'DashboardController@deletemovie')->where('id','[0-9]+')->name('deletemovie');

  Route::get('/dashboard/ajouter-un-imdb', 'DashboardController@addimdb')->name('addimdb');
  Route::post('/dashboard/ajouter-un-film', 'DashboardController@findmovie')->name('findmovie');
  Route::post('/dashboard/enregistrer-un-film', 'DashboardController@addmovie')->name('addmovie');
});


Auth::routes();
