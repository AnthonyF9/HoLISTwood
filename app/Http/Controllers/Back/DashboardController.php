<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


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
      return view('back/movies/add-movie');
  }

  protected function addmovie()
  {

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
