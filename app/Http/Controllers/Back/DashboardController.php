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
        // if (!empty($request->title)) { $title = $request->title; } else { $title = ''; }
        // if (!empty($request->year)) { $year = $request->year; } else { $year = ''; }
        // if (!empty($request->runtime)) { $runtime = $request->runtime; } else { $runtime = ''; }
        // if (!empty($request->director)) { $director = $request->director; } else { $director = ''; }
        // if (!empty($request->writers)) { $writers = $request->writers; } else { $writers = ''; }
        // if (!empty($request->actors)) { $actors = $request->actors; } else { $actors = ''; }
        // if (!empty($request->plot)) { $plot = $request->plot; } else { $plot = ''; }
        // if (!empty($request->awards)) { $awards = $request->awards; } else { $awards = ''; }
        // if (!empty($request->poster)) { $poster = $request->poster; } else { $poster = ''; }
        // if (!empty($request->imdb_id)) { $imdb_id = $request->imdb_id; } else { $imdb_id = ''; }
        // if (!empty($request->production)) { $production = $request->production; } else { $production = ''; }
        // if (!empty($request->website)) { $website = $request->website; } else { $website = ''; }
        // if (!empty($request->genre)) { $genre = $request->genre; } else { $genre = ''; }
        // if (!empty($request->status)) { $status = $request->status; } else { $status = ''; }
        // $date = new \DateTime();
        // $movie = [];
        // $movie[] = [
        // 'title' => $title,
        // 'year' => $year,
        // 'runtime' => $runtime,
        // 'director' => $director,
        // 'writers' => $writers,
        // 'actors' => $actors,
        // 'plot' => $plot,
        // 'awards' => $awards,
        // 'poster' => $poster,
        // 'imdb_id' => $imdb_id,
        // 'production' => $production,
        // 'website' => $website,
        // 'genre' => $genre,
        // 'status' => $status,
        // 'created_at' => $date->format('Y-m-d H:i:s'),
        // 'updated_at' => $date->format('Y-m-d H:i:s')
        // ];
        // DB::table('movies')->insert($movie);
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
