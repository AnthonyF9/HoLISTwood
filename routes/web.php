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
});

//////////////////////////////////////////////////////////////////////////////
///////////////////////           BACK          //////////////////////////////
//////////////////////////////////////////////////////////////////////////////
Route::group(['namespace' => 'Back'], function () {
  Route::get('/dashboard', 'DashboardController@dashboard')->name('dashboard');
  Route::get('/dashboard/ajouter-un-imdb', 'DashboardController@addimdb')->name('addimdb');
  Route::post('/dashboard/ajouter-un-film', 'DashboardController@findmovie')->name('findmovie');
  Route::post('/dashboard/enregistrer-un-film', 'DashboardController@addmovie')->name('addmovie');
});


Auth::routes();
