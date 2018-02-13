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
        Movie::Create($request->all()
        // if (!empty($request->title)) { 'title' => $request->title; }
        // if (!empty($request->title)) { 'year' => $request->title; }
        // if (!empty($request->title)) { 'runtime' => $request->title; }
        // if (!empty($request->title)) { 'director' => $request->title; }
        // if (!empty($request->title)) { 'writers' => $request->title; }
        // if (!empty($request->title)) { 'actors' => $request->title; }
        // if (!empty($request->title)) { 'plot' => $request->title; }
        // if (!empty($request->title)) { 'awards' => $request->title; }
        // if (!empty($request->title)) { 'poster' => $request->title; }
        // if (!empty($request->title)) { 'imdb_id' => $request->title; }
        // if (!empty($request->title)) { 'production' => $request->title; }
        // if (!empty($request->title)) { 'website' => $request->title; }
        // if (!empty($request->title)) { 'genre' => $request->title; }
        // if (!empty($request->title)) { 'status' => $request->title; }
        // []
      );
        return redirect()->route('addimdb')->with('status', 'Film ajouté');
      } else {
        return redirect()->route('addimdb')->with('status', 'Film déjà existant'); // si l'IMDB existe déjà, on ne rajoute pas le film
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

    return redirect()->route('movieslist')->with('status', 'Film modifié');
  }

  public function deletemovie(Request $request, $id)
    {
      Movie::findOrFail($id)->delete($request->all());

      return redirect()->route('movieslist')->with('status', 'Film supprimé');
    }

}
