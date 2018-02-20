<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Http\Requests\MovieRequest;
use App\Http\Requests\ImdbRequest;
use App\Http\Requests\TrailerRequest;
use App\Http\Controllers\Controller;
use App\Movie;
use App\Trailer;
use Carbon\Carbon;
use \DB;


class MoviesController extends Controller
{
  public function addimdb()
  {
      return view('back/movies/add-imdb');
  }

  public function getimdb(ImdbRequest $request)
  {
      $urlmovie = 'http://www.omdbapi.com/?i='. $request->imdb . '&apikey=1f275ea3&plot=full';
      // echo $urlmovie;
      // 1f275ea3
      // 67f441c
      // vérification de la syntaxe de l'IMDB
      if (substr( $request->imdb, 0, 2 ) === "tt" &&  strlen($request->imdb) === 9 ) {
        $opts = array(
          'http' => array(
              'method' => "GET"
          )
        );
        $context = stream_context_create($opts);
        $raw = file_get_contents($urlmovie, true, $context);
        $movie1 = json_decode($raw, true);
        $request->session()->put('movie', $movie1);
        $movie = $request->session()->get('movie');
        return view('back/movies/add-movie', compact('movie'));
        // return redirect()->route('verifymovie')->with('error', 'invalid IMDB ID');
      } else {
        return redirect()->route('addimdb')->with('error', 'invalid IMDB ID');
      }
  }

  public function verifymovie(Request $request)
  {
      $movie = $request->session()->get('movie');
      return view('back/movies/add-movie', compact('movie'));
  }


  // public function addmovie2(Request $request)
  // {
  //
  //
  //     $urlmovie = 'http://www.omdbapi.com/?i='. $request->imdb . '&apikey=1f275ea3&plot=full';
  //       return view('back/movies/add-movie', compact('urlmovie'));
  //
  // }



  public function addmovie(MovieRequest $request)
  {

    // dd($errors->all());
    // dd($request->all());
    // on vérifie si l'IMDB indiqué existe déjà dans la BDD
       $movies = Movie::orderBy('created_at','desc')->get();
       $plucked = $movies->pluck('imdb_id');
       $plucked->all();
       $test = implode(",", $plucked->all());

      $mystring = $test;
      $findme   = $request->imdb_id;
      $pos = strpos($mystring, $findme);
      // dd($errors);
      if ($pos === false) {
        // dd($request->all());
        Movie::Create($request->all());
        $thisMovie = \DB::table('movies')
                    ->where('imdb_id', '=', $request->imdb_id)
                    ->get();
        // dd($thisMovie[0]->id);
        $trailer[] = [
          'id_movie'  => $thisMovie[0]->id,
          'url_trailer' => ''
        ];
        \DB::table('trailer')->insert($trailer);

        return redirect()->route('addimdb')->with('status', 'Movie added');
      } else {
        return redirect()->route('addimdb')->with('error', 'This movie already exists'); // si l'IMDB existe déjà, on ne rajoute pas le movie
      }
  }

  public function movieslist()
  {
      $movies = Movie::orderBy('created_at','desc')->where('moderation', '=', 'ok')->paginate(6);
      $nbmoviesintrash = \DB::table('movies')->select(DB::raw('*'))
                     ->where('moderation', '=', 'softdelete')
                     ->count();
      return view('back/movies/movies-list', compact('movies','nbmoviesintrash'));
  }

  public function moviesintrash()
  {
      $movies = Movie::orderBy('created_at','desc')->where('moderation', '=', 'softdelete')->paginate(6);
      $nbmoviesintrash = \DB::table('movies')->select(DB::raw('*'))
                     ->where('moderation', '=', 'softdelete')
                     ->count();
      return view('back/movies/movies-in-trash', compact('movies','nbmoviesintrash'));
  }

  public function restoremovie($id)
  {
    Movie::findOrFail($id)->update(['moderation' => 'ok']);
    return redirect()->route('movieslist')->with('status', 'Movie restored');
  }

  public function editmovie($id)
  {
    $movie = Movie::findOrFail($id);
    return view('back/movies/update-movie', compact('id', 'movie'));
  }

  public function editmovieaction(MovieRequest $request, $id)
  {
    Movie::findOrFail($id)->update($request->all());
    return redirect()->route('movieslist')->with('status', 'Movie edited');
  }

  public function softdeletemovie(Request $request, $id)
  {
    Movie::findOrFail($id)->update(['moderation' => 'softdelete']);
    return redirect()->route('movieslist')->with('status', 'Movie deleted');
  }

  public function deletemovie(Request $request, $id)
  {
    Movie::findOrFail($id)->delete($request->all());
    \DB::table('trailer')
            ->where('id_movie', '=', $id)
            ->delete();
    return redirect()->route('movieslist')->with('status', 'Movie deleted');
  }

  public function movieslistrailers()
  {
      $movies = \DB::table('trailer')
                  ->join('movies', 'movies.id', '=', 'trailer.id_movie')
                  ->orderBy('created_at', 'DESC')
                  ->paginate(6);
      return view('back/movies/movies-list-trailers', compact('movies'));
  }
  public function addtrailers($id)
  {
    // $movie = Movie::findOrFail($id);
    $trailersToOneMovie = \DB::table('trailer')
                ->join('movies', 'movies.id', '=', 'trailer.id_movie')
                ->where('trailer.id_movie', '=', $id)
                ->get();
    return view('back/movies/add-trailers', compact('id', 'trailersToOneMovie'));
  }
  public function addtraileraction(TrailerRequest $request, $id)
  {
    // Movie::findOrFail($id)->create($request->all());
    $traileralreadyexists = \DB::table('trailer')
                            ->join('movies', 'movies.id', '=', 'trailer.id_movie')
                            ->where('trailer.url_trailer', '=', $request->trailer)
                            ->get();
    if (!isset($traileralreadyexists[0])) {
      $trailer[] = [
        'id_movie'  => $id,
        'url_trailer' => $request->trailer
      ];
      \DB::table('trailer')->insert($trailer);
    }
    else {
      $trailersToOneMovie = \DB::table('trailer')
                  ->join('movies', 'movies.id', '=', 'trailer.id_movie')
                  ->where('trailer.id_movie', '=', $id)
                  ->get();
      // return view('back/movies/add-trailers', compact('id', 'trailersToOneMovie'))->with('status', 'Trailer already exists');
      return redirect()->route('addtrailers', compact('id', 'trailersToOneMovie'))->with('status-error', 'Trailer already exists');
    }
    return redirect()->route('movieslistrailers')->with('status', 'Trailer added');
  }

  public function addtrailerfornewmovie()
  {
    return view('back/movies/add-new-trailer');
  }
  public function addtrailerfornewmovieaction(TrailerRequest $request)
  {
    // Movie::findOrFail($id)->create($request->all());
    $traileralreadyexists = \DB::table('trailer')
                            ->join('movies', 'movies.id', '=', 'trailer.id_movie')
                            ->where('trailer.url_trailer', '=', $request->trailer)
                            ->get();
    if (!isset($traileralreadyexists[0])) {
      $trailer[] = [
        'id_movie'  => $request->id_movie,
        'url_trailer' => $request->trailer
      ];
      \DB::table('trailer')->insert($trailer);
    }
    else {
      $trailersToOneMovie = \DB::table('trailer')
                  ->join('movies', 'movies.id', '=', 'trailer.id_movie')
                  ->where('trailer.id_movie', '=', $id)
                  ->get();
      // return view('back/movies/add-trailers', compact('id', 'trailersToOneMovie'))->with('status', 'Trailer already exists');
      return redirect()->route('addtrailers', compact('id', 'trailersToOneMovie'))->with('status-error', 'Trailer already exists');
    }
    return redirect()->route('movieslistrailers')->with('status', 'Trailer added');
  }



  public function moviesmoderatelist()
  {
      $movies = Movie::orderBy('created_at','desc')->where('moderation', '=', 'waiting')->paginate(6);
      return view('back/movies/movies-moderate-list', compact('movies'));
  }

  public function moderatemovie($id)
  {
    $movie = Movie::findOrFail($id);
    return view('back/movies/moderate-movie', compact('id', 'movie'));
  }

  public function moderatemovieaction(MovieRequest $request, $id)
  {
    Movie::findOrFail($id)->update($request->all());
    return redirect()->route('moderatemovieslist')->with('status', 'Movie edited');
  }

}
