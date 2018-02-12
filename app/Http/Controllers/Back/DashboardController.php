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
      // return view('back/movies/add-movie');
  }
}
