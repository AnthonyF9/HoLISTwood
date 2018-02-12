<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Http\Requests\MovieRequest;
use App\Http\Controllers\Controller;
use App\Movie;
use Carbon\Carbon;


class DashboardController extends Controller
{
  public function dashboard()
  {
      return view('back/dashboard');
  }
  public function addimdb()
  {
      return view('back/movies/add-imdb');
  }
  public function findmovie(Request $request)
  {
      $urlmovie = 'http://www.omdbapi.com/?i='. $request->imdb . '&apikey=67f441ca&plot=full';
      return view('back/movies/add-movie', compact('urlmovie'));
  }

  protected function addmovie(MovieRequest $request)
  {

    $newmovie = array_merge($request->all());
    Movie::create($newmovie);

      // return Movies::create([
      //     'title' => $imdb['name'],
      //     'year' => $imdb['year'],
      //     'runtime' => $imdb['runtime'],
      //     'director' => $imdb['director'],
      //     'writers' => $imdb['writers'],
      //     'actors' => $imdb['actors'],
      //     'plot' => $imdb['plot'],
      //     'awards' => $imdb['awards'],
      //     'imdp_ip' => $imdb['imdp_ip'],
      //     'production' => $imdb['production'],
      //     'website' => $imdb['website'],
      //     'genre' => $imdb['genre'],
      //     'status' => $imdb['status'],
      // ]);


  }
}
