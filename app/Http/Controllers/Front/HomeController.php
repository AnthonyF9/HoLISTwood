<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Movie;
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

    public function profile()
    {
        return view('front/profile');
    }

    public function oneMovie($imdb_id)
    {
        $movie = \DB::table('movies')->where('imdb_id','=',$imdb_id)->get();
        if (!empty($movie)) {
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

    public function favorite()
    {
      // $movie = DB::table('movies')
      //           ->leftJoin('rating','movies.id','=','rating.id_movie')
      //           ->orderBy('rating.note','desc')
      //           ->get();
        return view('front/favorite',compact('movies'));
    }
}
