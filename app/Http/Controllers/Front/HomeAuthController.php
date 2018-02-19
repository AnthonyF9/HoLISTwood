<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\MovieRequest;
use App\Http\Requests\ImdbRequest;
use App\Http\Requests\FrontMovieRequest;
use App\Movie;

class HomeAuthController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile()
    {
        return view('front/profile');
    }

    public function favorite()
    {
      // $movie = DB::table('movies')
      //           ->leftJoin('rating','movies.id','=','rating.id_movie')
      //           ->orderBy('rating.note','desc')
      //           ->get();
        return view('front/favorite',compact('movies'));
    }

    public function submitmoviebyitems()
    {
        return view('front/submitmovie/submitmoviebyitems');
    }

    public function submitmovieaction(FrontMovieRequest $request)
    {
      // on vérifie si l'IMDB indiqué existe déjà dans la BDD
        $movies = Movie::orderBy('created_at','desc')->get();
        $plucked = $movies->pluck('imdb_id');
        $plucked->all();
        $test = implode(",", $plucked->all());
        $mystring = $test;
        $findme   = $request->imdb_id;
        $pos = strpos($mystring, $findme);
        if ($pos === false) {
          Movie::Create($request->all());
          return redirect()->route('submitmoviebyitems')->with('status', 'Movie submitted');
        } else {
          return redirect()->route('submitmoviebyitems')->with('error', 'This movie already exists in Holistwood'); // si l'IMDB existe déjà, on ne rajoute pas le movie
        }
    }


    public function submitmoviebyimdb()
    {
        return view('front/submitmovie/submitmoviebyimdb');
    }
    public function findmoviebyimdb(ImdbRequest $request)
    {
        $urlmovie = 'http://www.omdbapi.com/?i='. $request->imdb . '&apikey=1f275ea3&plot=full';
        // echo $urlmovie;
        // 1f275ea3
        // 67f441c

        // vérification de la syntaxe de l'IMDB
        if (substr( $request->imdb, 0, 2 ) === "tt" &&  strlen($request->imdb) === 9 ) {
          return view('front/submitmovie/submitmovieimdbverif', compact('urlmovie'));
        } else {
          return redirect()->route('submitmoviebyimdb')->with('error', 'invalid IMDB ID');
        }
    }
    public function addmoviebyimdb(MovieRequest $request)
    {
      // on vérifie si l'IMDB indiqué existe déjà dans la BDD
         $movies = Movie::orderBy('created_at','desc')->get();
         $plucked = $movies->pluck('imdb_id');
         $plucked->all();
         $test = implode(",", $plucked->all());
        $mystring = $test;
        $findme   = $request->imdb_id;
        $pos = strpos($mystring, $findme);
        if ($pos === false) {
          Movie::Create($request->all());
          return redirect()->route('submitmoviebyimdb')->with('status', 'Movie submitted');
        } else {
          return redirect()->route('submitmoviebyimdb')->with('error', 'This movie already exists in Holistwood'); // si l'IMDB existe déjà, on ne rajoute pas le movie
        }
    }
}
