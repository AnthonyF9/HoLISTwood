<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Movie;
use App\trailer;
use \DB;


class SearchController extends Controller
{
  public function search(Request $request) {

      $name = $request->research;

      $movies = Movie::where([['title', 'like', '%' . $name . '%'],['moderation', '!=', 'softdelete']])->orWhere([['director', 'like', '%' . $name . '%'],['moderation', '!=', 'softdelete']])->orWhere([['year', '=', $name ],['moderation', '!=', 'softdelete']])->orderBy('created_at','desc')->paginate(7);

      $nbmoviesintrash = \DB::table('movies')->select(DB::raw('*'))
                     ->where('moderation', '=', 'softdelete')
                     ->count();

      return view('back/movies/movies-list', compact('movies', 'nbmoviesintrash'));
       // return $movies;
  }

  public function searchtrash(Request $request) {

      $name = $request->research;

      $movies = Movie::where([['title', 'like', '%' . $name . '%'],['moderation', '=', 'softdelete']])->orWhere([['director', 'like', '%' . $name . '%'],['moderation', '=', 'softdelete']])->orWhere([['year', '=', $name ],['moderation', '=', 'softdelete']])->orderBy('created_at','desc')->paginate(7);

      $nbmoviesintrash = \DB::table('movies')->select(DB::raw('*'))
                     ->where('moderation', '=', 'softdelete')
                     ->count();

      return view('back/movies/movies-in-trash', compact('movies', 'nbmoviesintrash'));
       // return $movies;
  }

  public function searchmoderation(Request $request) {

      $name = $request->research;

      $movies = Movie::where([['title', 'like', '%' . $name . '%'],['moderation', '=', 'waiting']])->orWhere([['director', 'like', '%' . $name . '%'],['moderation', '=', 'waiting']])->orWhere([['year', '=', $name ],['moderation', '=', 'waiting']])->orderBy('created_at','desc')->paginate(7);

      return view('back/movies/movies-moderate-list', compact('movies'));
       // return $movies;
  }

  public function searchMovieWithtrailer(Request $request) {

      $name = $request->research;

      $movies = \DB::table('trailer')
                  ->join('movies', 'movies.id', '=', 'trailer.id_movie')
                  ->where('title', 'like', '%' . $name . '%')
                  ->orderBy('created_at', 'DESC')
                  ->paginate(10);

      // $movies = Trailer::where('title', 'like', '%' . $name . '%')->orderBy('created_at','desc')->paginate(10);

      return view('back/movies/movies-list-trailers', compact('movies'));
       // return $movies;
  }
}
