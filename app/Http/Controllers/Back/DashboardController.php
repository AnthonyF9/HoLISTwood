<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Http\Requests\MovieRequest;
use App\Http\Controllers\Controller;
use App\Movie;
use Carbon\Carbon;
use \DB;


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
      // echo $urlmovie;
      return view('back/movies/add-movie', compact('urlmovie'));
  }

  protected function addmovie(MovieRequest $request)
  {
    // $newmovie = array_merge($request->all());
    // dd($request->imdb_id);
      // dd($imdb_table);
       $movies = Movie::orderBy('created_at','desc')->get();
       $plucked = $movies->pluck('imdb_id');
       $plucked->all();
       // dd($plucked);
       $test = implode(",", $plucked->all());
       // dd($test);
       // echo $test;
      $mystring = $test;
      $findme   = $request->imdb_id;
      $pos = strpos($mystring, $findme);
      if ($pos === false) {
        Movie::Create($request->all());
        return redirect()->route('addimdb')->with('status', 'Movie added');
      } else {
        return redirect()->route('addimdb')->with('status', 'This movie already exists'); // si l'IMDB existe déjà, on ne rajoute pas le film
      }
  }

  public function movieslist()
  {
      $movies = Movie::orderBy('created_at','desc')->paginate(10);

      return view('back/movies/movies-list', compact('movies'));
  }

  public function modifierfilm($id)
  {
    $movie = Movie::findOrFail($id);
    return view('back/movies/update_movie', compact('id', 'movie'));
  }

  public function modifierfilmaction(MovieRequest $request, $id)
  {
    Movie::findOrFail($id)->update($request->all());

    return redirect()->route('movieslist')->with('status', 'Movie edited');
  }

  public function deletemovie(Request $request, $id)
    {
      Movie::findOrFail($id)->delete($request->all());

      return redirect()->route('movieslist')->with('status', 'Movie deleted');
    }

}
