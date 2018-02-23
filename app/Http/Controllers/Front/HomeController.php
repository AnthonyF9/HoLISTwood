<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Movie;
use App\Trailer;
use App\MyList;
use Auth;


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
      $movies = Movie::inRandomOrder()->where('moderation', '=', 'ok')->limit(12)->get();

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
        if (isset($movie[0])) {
          if (!empty($movie) && $movie[0]->moderation != 'softdelete') {
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
                        ->select('comments.id','comments.id_user','comments.id_movie','comments.content','comments.content','comments.created_at','comments.updated_at','users.name')
                        ->join('movies', 'movies.id', '=', 'comments.id_movie')
                        ->join('users', 'users.id', '=', 'comments.id_user')
                        ->where('imdb_id','=',$imdb_id)
                        ->orderBy('created_at','DESC')
                        ->get();
            return view('front/oneMovie', compact('imdb_id', 'movie', 'trailers', 'moyrating', 'allcomments'));
          } else { abort(404); }
        } else { abort(404); }
    }

    public function frontmovieslist()
    {
        $movies = Movie::orderBy('title','asc')->where('moderation', '=', 'ok')->paginate(42);

      return view('front/frontmovieslist', compact('movies'));
    }

    public function searchfrontmovies(Request $request) {

        if($request->ajax()){

        $output="";

        $movies = \DB::table('movies')->where([['title', 'like', '%' . $request->search . '%'],['moderation', '=', 'ok']])->orWhere([['year', '=', $request->search ],['moderation', '=', 'ok']])->orderBy('created_at','desc')->paginate(7);



          if (!empty($movies[0])) {



        foreach ($movies as $movie) {

          if (Auth::user()) {
            $route = '<a href='. route('oneMovieAuth', array( 'imdb_id'=> $movie->imdb_id ))  .'>';
          } else {
            $route = '<a href='. route('oneMovie', array( 'imdb_id'=> $movie->imdb_id ))  .'>';
          }

          $output.= '<div class="grid">'.
                   $route.
                   '<figure data-aos="fade-up" class="effect-zoe">'.
                   '<img src=' .$movie->poster. 'alt=' .$movie->title. '/>'.
                   '<figcaption>'.
                   '<h2>' .$movie->title. '</h2>'.
                   '</figcaption>'.
                   '</figure>'.
                   '</a>'.
                   '</div>';


           }


        } else {
          $output.="Sorry we didn't find any movies";
        }
            return response()->json([
              'output' => $output,
            ]);

      }
    }

    public function about()
    {
        return view('front/about');
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
