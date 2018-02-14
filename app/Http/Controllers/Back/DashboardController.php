<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Http\Requests\MovieRequest;
use App\Http\Requests\ImdbRequest;
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
  public function findmovie(ImdbRequest $request)
  {
      $urlmovie = 'http://www.omdbapi.com/?i='. $request->imdb . '&apikey=1f275ea3&plot=full';
      // echo $urlmovie;
      // 1f275ea3
      // 67f441c

      // vérification de la syntaxe de l'IMDB
      if (substr( $request->imdb, 0, 2 ) === "tt" &&  strlen($request->imdb) === 9 ) {
        return view('back/movies/add-movie', compact('urlmovie'));
      } else {
        return redirect()->route('addimdb')->with('error', 'invalid IMDB ID');
      }
  }

  public function addmovie(MovieRequest $request)
  {

    // on vérifie si l'IMDB indiqué existe déjà dans la BDD ->

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
        return redirect()->route('addimdb')->with('error', 'This movie already exists'); // si l'IMDB existe déjà, on ne rajoute pas le film
      }
  }

  public function movieslist()
  {
      $movies = Movie::orderBy('created_at','desc')->paginate(6);

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
