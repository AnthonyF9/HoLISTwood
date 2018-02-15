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
  Route::get('/events', 'EventController@index')->name('events');
  Route::get('/movie/{imdb_id}', 'HomeController@oneMovie')->name('oneMovie');
});

//////////////////////////////////////////////////////////////////////////////
///////////////////////           BACK          //////////////////////////////
//////////////////////////////////////////////////////////////////////////////
  Route::group(['namespace' => 'Back'], function () {
  Route::get('/dashboard', 'DashboardController@dashboard')->name('dashboard');

  Route::get('/dashboard/movies-list', 'MoviesController@movieslist')->name('movieslist');
  Route::get('/dashboard/movies-list/waste', 'MoviesController@moviesintrash')->name('moviesintrash');
  Route::put('/dashboard/movies-list/restore/{id}', 'MoviesController@restoremovie')->where('id','[0-9]+')->name('restoremovie');
  Route::get('/dashboard/movies-list/search', 'SearchController@search')->name('search');

  Route::get('/dashboard/update-movie/{id}', 'MoviesController@editmovie')->where('id','[0-9]+')->name('editmovie');
  Route::put('/dashboard/update-movie/{id}', 'MoviesController@editmovieaction')->where('id','[0-9]+')->name('editmovie-action');
  Route::put('/dashboard/delete-movie/{id}', 'MoviesController@softdeletemovie')->where('id','[0-9]+')->name('softdeletemovie');
  Route::delete('/dashboard/delete-movie/{id}', 'MoviesController@deletemovie')->where('id','[0-9]+')->name('deletemovie');

  Route::get('/dashboard/add-imdb', 'MoviesController@addimdb')->name('addimdb');
  Route::match(['get', 'post'],'/dashboard/add-movie', 'MoviesController@findmovie')->name('findmovie');
  Route::post('/dashboard/save-movie', 'MoviesController@addmovie')->name('addmovie');

  Route::get('/dashboard/users-list', 'UsersController@userslist')->name('userslist');
  Route::get('/dashboard/update-user/{id}', 'UsersController@edituser')->where('id','[0-9]+')->name('edituser');
  Route::put('/dashboard/update-user/{id}', 'UsersController@edituseraction')->where('id','[0-9]+')->name('edituser-action');

});


Auth::routes();
