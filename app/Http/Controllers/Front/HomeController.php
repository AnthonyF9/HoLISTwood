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
                  ->where('url_trailer', '!=', '')
                  ->get();

      $count = count($trailers) - 1;
      $randomid = rand(0, $count);

        return view('front/home',compact('movies','trailers', 'randomid'));
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
          $allcomments = \DB::table('comments')
                      ->select('comments.id_user','comments.id_movie','comments.content','comments.content','comments.created_at','comments.updated_at','users.name')
                      ->join('movies', 'movies.id', '=', 'comments.id_movie')
                      ->join('users', 'users.id', '=', 'comments.id_user')
                      ->where('imdb_id','=',$imdb_id)
                      ->orderBy('created_at','DESC')
                      ->get();
          return view('front/oneMovie', compact('imdb_id', 'movie', 'trailers', 'moyrating', 'allcomments'));
        } else { abort(404); }
    }

    public function frontmovieslist()
    {
      $movies = Movie::orderBy('created_at','desc')->where('moderation', '=', 'ok')->paginate(24);

      return view('front/frontmovieslist', compact('movies'));
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
