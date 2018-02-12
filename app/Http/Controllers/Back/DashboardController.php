<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class DashboardController extends Controller
{
  public function dashboard()
  {
      return view('layouts/backlayout');
  }
  
  protected function addmovie(array $imdb)
  {
      return Movies::create([
          'title' => $imdb['name'],
          'year' => $imdb['year'],
          'runtime' => $imdb['runtime'],
          'director' => $imdb['director'],
          'writers' => $imdb['writers'],
          'actors' => $imdb['actors'],
          'plot' => $imdb['plot'],
          'awards' => $imdb['awards'],
          'imdp_ip' => $imdb['imdp_ip'],
          'production' => $imdb['production'],
          'website' => $imdb['website'],
          'genre' => $imdb['genre'],
          'status' => $imdb['status'],
          'created_at' => $imdb['created_at'],
          'updated_at' => $imdb['updated_at'],
      ]);
  }
}
