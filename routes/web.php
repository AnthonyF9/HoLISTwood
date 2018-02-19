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
  //routes principales
  Route::get('/', 'HomeController@index')->name('home');
  Route::get('/intheater', 'HomeController@intheater')->name('intheater');
  Route::get('/lastupdate', 'HomeController@lastupdate')->name('lastupdate');

  //vue d'un film et ajout à sa liste
  Route::get('/movie/{imdb_id}', 'HomeController@oneMovie')->name('oneMovie');
  Route::post('/movie/{imdb_id}', 'HomeAuthController@addtomylist')->name('addtomylist');
  Route::put('/movie/{imdb_id}', 'HomeAuthController@updateinmylist')->name('updateinmylist');

  // inutile
  Route::get('/favorite', 'HomeAuthController@favorite')->name('favorite');

  // la page profile
  Route::get('/profile', 'HomeAuthController@profile')->name('profile');

  // proposer un film
  Route::get('/submit-movie', 'HomeAuthController@submitmoviebyimdb');
    // proposer un film via title
    Route::get('/submit-movie/by-items', 'HomeAuthController@submitmoviebyitems')->name('submitmoviebyitems');
    Route::post('/submit-movie/by-items', 'HomeAuthController@submitmovieaction')->name('submitmovie-action');
    // proposer un film via imdb
    Route::get('/submit-movie/by-imdb', 'HomeAuthController@submitmoviebyimdb')->name('submitmoviebyimdb');
    Route::match(['get', 'post'],'/submit-movie/add-by-imdb', 'HomeAuthController@findmoviebyimdb')->name('findmoviebyimdb');
    Route::post('/submit-movie/save-movie-by-imdb', 'HomeAuthController@addmoviebyimdb')->name('addmoviebyimdb');

  // le calendrier
  Route::get('/events', 'EventController@index')->name('events');

  // autres trucs
  Route::get('/contact', 'HomeController@contact')->name('contact');
  Route::get('/staff', 'HomeController@staff')->name('staff');
  Route::get('/sitemap', 'HomeController@sitemap')->name('sitemap');
  Route::get('/gtu', 'HomeController@gtu')->name('gtu');
  Route::get('/charter', 'HomeController@charter')->name('charter');
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
  Route::get('/dashboard/movies-moderate-list', 'MoviesController@moviesmoderatelist')->name('moderatemovieslist');
  Route::get('/dashboard/movies-moderate-list/{id}', 'MoviesController@moderatemovie')->where('id','[0-9]+')->name('moderatemovie');
  Route::put('/dashboard/movies-moderate-list/{id}', 'MoviesController@moderatemovieaction')->where('id','[0-9]+')->name('moderatemovie-action');

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
