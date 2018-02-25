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
  Route::get('/movies-list', 'HomeController@frontmovieslist')->name('frontmovieslist');
  Route::get('/movies-list/search', 'HomeController@searchfrontmovies')->name('searchfrontmovies');
  Route::get('/events', 'EventController@index')->name('events');   // le calendrier

  //vue d'un film, ajout à sa liste, notation
  Route::get('/movie/{imdb_id}/view', 'HomeController@oneMovie')->name('oneMovie');

  Route::get('/movie/{imdb_id}', 'HomeAuthController@oneMovieAuth')->name('oneMovieAuth');
  Route::post('/movie/{imdb_id}/add-to-my-list', 'HomeAuthController@addtomylist')->name('addtomylist');
  Route::put('/movie/{imdb_id}/update-my-list', 'HomeAuthController@updateinmylist')->name('updateinmylist');
  Route::post('/movie/{imdb_id}/rating', 'HomeAuthController@rate')->name('rate');
  Route::put('/movie/{imdb_id}/update-my-rating', 'HomeAuthController@updatemyrating')->name('updatemyrating');
  // commenter sur la page d'un film
  Route::post('/movie/{imdb_id}/comment', 'HomeAuthController@postcomment')->name('postcomment');
  // modifier un commentaire
  Route::get('/movie/{imdb_id}/comment/update-number-{idcomment}', 'HomeAuthController@updatecomment')->name('updatecomment');
  Route::get('/movie/{imdb_id}/comment/edit-number-{idcomment}', 'HomeAuthController@oneMovieAuthEditComment')->name('oneMovieAuthEditComment');
  Route::put('/movie/{imdb_id}/comment/update-number-{idcomment}/go', 'HomeAuthController@updatecommentaction')->name('updatecommentaction');
  // signaler un commentaire
  Route::post('/movie/{imdb_id}/report-comment', 'HomeAuthController@reportcomment')->name('reportcomment');

  // la page profile
  Route::get('/profile', 'HomeAuthController@profile')->name('profile');

  // proposer un film
  Route::get('/submit-movie', 'HomeAuthController@submitmoviebyimdb');
    // proposer un film via title
    Route::get('/submit-movie/by-items', 'HomeAuthController@submitmoviebyitems')->name('submitmoviebyitems');
    Route::post('/submit-movie/by-items', 'HomeAuthController@submitmovieaction')->name('submitmovie-action');
    // proposer un film via imdb
    Route::get('/submit-movie/by-imdb', 'HomeAuthController@submitmoviebyimdb')->name('submitmoviebyimdb');
    Route::post('/submit-movie/add-by-imdb', 'HomeAuthController@findmoviebyimdb')->name('findmoviebyimdb');
    Route::get('/submit-movie/add-by-imdb', 'HomeAuthController@verifymoviebyimdb')->name('verifymoviebyimdb');
    Route::post('/submit-movie/save-movie-by-imdb', 'HomeAuthController@addmoviebyimdb')->name('addmoviebyimdb');

  // pour les modo
  Route::get('/mod/reported-comments/all', 'HomeModController@allreportedcomments')->name('allreportedcomments');
  Route::post('/mod/reported-comments/commentIsOk', 'HomeModController@commentIsOk')->name('commentIsOk');
  Route::put('/mod/reported-comments/deleteComment', 'HomeModController@deleteComment')->name('deleteComment');
  Route::post('/mod/reported-comments/askingbannishuser', 'HomeModController@askingbannishuser')->name('askingbannishuser');

  // autres routes
  Route::get('/contact', 'HomeController@contact')->name('contact');
  Route::get('/about', 'HomeController@about')->name('about');
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
  Route::get('/dashboard/movies-list/waste/searchtrash', 'SearchController@searchtrash')->name('searchtrash');
  Route::put('/dashboard/movies-list/restore/{id}', 'MoviesController@restoremovie')->where('id','[0-9]+')->name('restoremovie');
  Route::get('/dashboard/movies-list/search', 'SearchController@search')->name('search');
  Route::get('/dashboard/movies-moderate-list', 'MoviesController@moviesmoderatelist')->name('moderatemovieslist');
  Route::get('/dashboard/movies-moderate-list/searchmoderation', 'SearchController@searchmoderation')->name('searchmoderation');
  Route::get('/dashboard/movies-moderate-list/{id}', 'MoviesController@moderatemovie')->where('id','[0-9]+')->name('moderatemovie');
  Route::put('/dashboard/movies-moderate-list/{id}', 'MoviesController@moderatemovieaction')->where('id','[0-9]+')->name('moderatemovie-action');

  Route::get('/dashboard/update-movie/{id}', 'MoviesController@editmovie')->where('id','[0-9]+')->name('editmovie');
  Route::put('/dashboard/update-movie/{id}', 'MoviesController@editmovieaction')->where('id','[0-9]+')->name('editmovie-action');
  Route::put('/dashboard/delete-movie/{id}', 'MoviesController@softdeletemovie')->where('id','[0-9]+')->name('softdeletemovie');
  Route::delete('/dashboard/delete-movie/{id}', 'MoviesController@deletemovie')->where('id','[0-9]+')->name('deletemovie');

  Route::get('/dashboard/trailers/search', 'SearchController@searchMovieWithtrailer')->name('searchMovieWithtrailer');
  Route::get('/dashboard/trailers/trailers-list', 'MoviesController@movieslistrailers')->name('movieslistrailers');

  Route::get('/dashboard/trailers/update-trailer/{id}', 'MoviesController@changetrailer')->where('id','[0-9]+')->name('changetrailer');
  Route::put('/dashboard/trailers/update-trailer/{id}', 'MoviesController@changetraileraction')->where('id','[0-9]+')->name('changetraileraction');

  Route::get('/dashboard/trailers/add-new-trailer', 'MoviesController@addtrailerfornewmovie')->name('addtrailerfornewmovie');
  Route::post('/dashboard/trailers/add-new-trailer', 'MoviesController@addtrailerfornewmovieaction')->name('addtrailerfornewmovieaction');

  Route::get('/dashboard/add-imdb', 'MoviesController@addimdb')->name('addimdb');
  Route::post('/dashboard/add-movie', 'MoviesController@getimdb')->name('getimdb');
  Route::get('/dashboard/add-movie', 'MoviesController@verifymovie')->name('verifymovie');
  Route::post('/dashboard/save-movie', 'MoviesController@addmovie')->name('addmovie');

  Route::get('/dashboard/users-list', 'UsersController@userslist')->name('userslist');
  Route::get('/dashboard/update-user/{id}', 'UsersController@edituser')->where('id','[0-9]+')->name('edituser');
  Route::put('/dashboard/update-user/{id}', 'UsersController@edituseraction')->where('id','[0-9]+')->name('edituser-action');
  Route::get('/dashboard/users-reported', 'UsersController@usersreported')->name('usersreported');
  Route::get('/dashboard/users-reported/{id}', 'UsersController@editreporteduser')->where('id','[0-9]+')->name('editreporteduser');
  Route::put('/dashboard/users-reported/{id}', 'UsersController@edituserreportedaction')->where('id','[0-9]+')->name('edituserreported-action');
  Route::post('/dashboard/users-list/dont-ban', 'UsersController@dontban')->name('dontban');
  Route::post('/dashboard/users-list/ban', 'UsersController@ban')->name('ban');

});


Auth::routes();
