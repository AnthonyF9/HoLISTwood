<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Movie;
use App\Trailer;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $movies = Movie::orderBy('created_at','desc')->where('moderation', '=', 'ok')->get();
        return view('front/home',compact('movies'));
    }

    public function oneMovie($imdb_id)
    {
        $movie = \DB::table('movies')->where('imdb_id','=',$imdb_id)->get();
        if (!empty($movie)) {

          $trailers = \DB::table('movies')
                      ->join('trailer', 'movies.id', '=', 'trailer.id_movie')
                      ->get();

          // dd($trailers);

          return view('front/oneMovie', compact('imdb_id','movie'));
        }
        else {
          abort(404);
        }



    }

    public function intheater()
    {
      $movies = Movie::orderBy('created_at','desc')->get();
      return view('front/intheater');
    }

    public function lastupdate()
    {
      $movies = Movie::orderBy('updated_at','desc')->get();
      return view('front/lastupdate');
    }
}
