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

      $trailers = \DB::table('movies')
                  ->join('trailer', 'movies.id', '=', 'trailer.id_movie')
                  ->get();

        return view('front/home',compact('movies','trailers'));
    }

    public function oneMovie($imdb_id)
    {
        $movie = \DB::table('movies')->where('imdb_id','=',$imdb_id)->get();
        if (!empty($movie)) {


          $trailers = \DB::table('movies')
                      ->join('trailer', 'movies.id', '=', 'trailer.id_movie')
                      ->where('imdb_id','=',$imdb_id)
                      ->get();

           // dd($trailers);

          return view('front/oneMovie', compact('imdb_id','movie', 'trailers'));
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
<<<<<<< HEAD

    public function favorite()
    {
      // $movie = DB::table('movies')
      //           ->leftJoin('rating','movies.id','=','rating.id_movie')
      //           ->orderBy('rating.note','desc')
      //           ->get();
        return view('front/favorite',compact('movies'));
    }

    public function contact()
    {
        return view('front/contact');
    }

    public function staff()
    {
        return view('front/staff');
    }

    public function sitemap()
    {
        return view('front/sitemap');
    }

    public function gtu()
    {
        return view('front/gtu');
    }

    public function charter()
    {
        return view('front/charter');
    }
=======
>>>>>>> 1d42f45d1577ac70133ca2019e81078c1d765c0f
}
