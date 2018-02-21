<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Movie;
use App\Trailer;
use App\MyList;


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
      $movies = Movie::orderBy('created_at','desc')->where('moderation', '=', 'ok')->limit(12)->get();

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
           $allratings = \DB::table('movies')
                       ->select('movies.title','rating.id_user','rating.id_movie','rating.id_user','rating.note')
                       ->join('rating', 'movies.id', '=', 'rating.id_movie')
                       ->where('imdb_id','=',$imdb_id)
                       ->get();
            $rating = [];
            foreach ($allratings as $key => $value) {  $rating[] = $value->note; }
            if (!empty($rating)) { $moyrating = round(array_sum($rating)/count($rating),1); }
            else {  $moyrating = ''; }
          return view('front/oneMovie', compact('imdb_id', 'movie', 'trailers', 'moyrating'));
        } else { abort(404); }
    }

    public function frontmovieslist()
    {
      $movies = Movie::orderBy('created_at','desc')->get();

      return view('front/frontmovieslist');
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
}
