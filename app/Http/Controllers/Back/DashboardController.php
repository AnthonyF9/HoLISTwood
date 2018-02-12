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
  public function addmovie()
  {
      return view('back/movies/add-movie');
  }
  public function savemovie(Request $request)
  {
      // return view('back/movies/add-movie');
  }
}
