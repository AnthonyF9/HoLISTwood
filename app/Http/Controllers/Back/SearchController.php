<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Movie;


class SearchController extends Controller
{
  public function search(Request $request) {

      $name = $request->research;
      
      $movies = Movie::where('title', 'like', '%' . $name . '%')->orWhere('director', 'like', '%' . $name . '%')->orWhere('year', '=', $name )->orderBy('created_at','desc')->paginate(7);

      return view('back/movies/movies-list', compact('movies'));
       // return $movies;
  }
}