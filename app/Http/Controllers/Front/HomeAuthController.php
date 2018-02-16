<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\MovieRequest;
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

    public function submitmovie()
    {
        return view('front/submitmovie');
    }

    public function submitmovieaction(MovieRequest $request)
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
          return redirect()->route('submitmovie')->with('status', 'Movie added');
        } else {
          return redirect()->route('submitmovie')->with('error', 'This movie already exists'); // si l'IMDB existe déjà, on ne rajoute pas le movie
        }
    }
}
