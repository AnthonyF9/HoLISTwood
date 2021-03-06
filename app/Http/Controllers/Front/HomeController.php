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
    public function index(Request $request)
    {

      $movies = Movie::inRandomOrder()->where('moderation', '=', 'ok')->limit(12)->get();
      $mostaddlistedmovies = $this->mostaddlistedmovies();

      $trailers = \DB::table('movies')
                  ->join('trailer', 'movies.id', '=', 'trailer.id_movie')
                  ->where('url_trailer', '!=', '')
                  ->where('release_date', '>=', \DB::raw('CURDATE()'))
                  ->get();

      $count = count($trailers) - 1;
      $randomid = rand(0, $count);
      $titre = 'coming soon';

      // dd($count);

      $nbcomm = \DB::table('reported_comments')->select(\DB::raw('*'))->count();

      if ($count < 0) {

        $trailers = \DB::table('movies')
                    ->join('trailer', 'movies.id', '=', 'trailer.id_movie')
                    ->where('url_trailer', '!=', '')
                    ->get();

        $count = count($trailers) - 1;
        $randomid = mt_rand(0, $count);
        $titre = 'trailers';

        // $request->session()->put('randomid', $randomid);
        // $value = $request->session()->get('randomid');


        return view('front/home',compact('movies','trailers', 'randomid', 'titre', 'nbcomm','mostaddlistedmovies'));
      }

        return view('front/home',compact('movies','trailers', 'randomid', 'titre', 'nbcomm','mostaddlistedmovies'));
    }

    public function oneMovie($imdb_id)
    {
        $movie = \DB::table('movies')->where('imdb_id','=',$imdb_id)->get();
        $nbcomm = \DB::table('reported_comments')->select(\DB::raw('*'))->count();
        $mostaddlistedmovies = $this->mostaddlistedmovies();
        $thiscomment = 0;
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
                        ->select('comments.state','comments.id','comments.id_user','comments.id_movie','comments.content','comments.content','comments.created_at','comments.updated_at','users.name')
                        ->join('movies', 'movies.id', '=', 'comments.id_movie')
                        ->join('users', 'users.id', '=', 'comments.id_user')
                        ->where([['imdb_id','=',$imdb_id],['state','!=','deleted']])
                        ->orderBy('created_at','DESC')
                        ->get();
            return view('front/oneMovie', compact('imdb_id', 'movie', 'trailers', 'moyrating', 'allcomments','nbcomm','mostaddlistedmovies','thiscomment'));
          } else { abort(404); }
        } else { abort(404); }
    }

    public function frontmovieslist()
    {
        $movies = Movie::orderBy('title','asc')->where('moderation', '=', 'ok')->paginate(42);
        $nbcomm = \DB::table('reported_comments')->select(\DB::raw('*'))->count();
        $moviesfull = Movie::where('moderation', '=', 'ok')->get();
        $totalmovies = count($moviesfull);
        $mostaddlistedmovies = $this->mostaddlistedmovies();

      return view('front/frontmovieslist', compact('movies', 'totalmovies','nbcomm','mostaddlistedmovies'));
    }

    public function searchfrontmovies(Request $request) {
      if($request->ajax()){
        $output="";
        $outputfull="";

        $movies = \DB::table('movies')->where([['title', 'like', '%' . $request->search . '%'],['moderation', '=', 'ok']])->orWhere([['year', '=', $request->search ],['moderation', '=', 'ok']])->orWhere([['actors', 'like', '%'.  $request->search .'%' ],['moderation', '=', 'ok']])->orWhere([['director', 'like', '%'.  $request->search .'%' ],['moderation', '=', 'ok']])->orderBy('year','asc')->get();
        $totalmoviessearch = count($movies);

        $moviesfull = Movie::orderBy('title','asc')->where('moderation', '=', 'ok')->paginate(42);
        $moviesfull->withPath('movies-list'); // Précise l'url de la pagination ( sans ça les liens de la pagination en ajax ne marchait pas )

          if (!empty($movies[0])) {

        $output.='<div class="pagination">'.
                 $totalmoviessearch . ' results for '. '"'.$request->search.'"' .
                 '</div>';

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



           $outputfull.='<div class="pagination">'.
                    '<div id="paginationlinks" class="paginatemovieslist">' .$moviesfull->links(). '</div>'.
                    '</div>';

           foreach ($moviesfull as $moviefull) {

             if (Auth::user()) {
               $routefull = '<a href='. route('oneMovieAuth', array( 'imdb_id'=> $moviefull->imdb_id ))  .'>';
             } else {
               $routefull = '<a href='. route('oneMovie', array( 'imdb_id'=> $moviefull->imdb_id ))  .'>';
             }

             $outputfull.=
                      '<div class="grid">'.
                      $routefull.
                      '<figure data-aos="fade-up" class="effect-zoe">'.
                      '<img src=' .$moviefull->poster. 'alt=' .$moviefull->title. '/>'.
                      '<figcaption>'.
                      '<h2>' .$moviefull->title. '</h2>'.
                      '</figcaption>'.
                      '</figure>'.
                      '</a>'.
                      '</div>';
              }

              $outputfull.='<div class="pagination">'.
                       '<div id="paginationlinks" class="paginatemovieslist">' .$moviesfull->links(). '</div>'.
                       '</div>';


        } else {
          $output.="Sorry we didn't find any movies";
        }
            return response()->json([
              'output' => $output,
              'outputfull' => $outputfull,
            ]);

    }
  }

    public function about()
    {
        $nbcomm = \DB::table('reported_comments')->select(\DB::raw('*'))->count();
        $mostaddlistedmovies = $this->mostaddlistedmovies();
        return view('front/about', compact('nbcomm','mostaddlistedmovies'));
    }

    public function staff()
    {
        $nbcomm = \DB::table('reported_comments')->select(\DB::raw('*'))->count();
        $mostaddlistedmovies = $this->mostaddlistedmovies();
        return view('front/staff', compact('nbcomm','mostaddlistedmovies'));
    }

    public function sitemap()
    {
        $nbcomm = \DB::table('reported_comments')->select(\DB::raw('*'))->count();
        $mostaddlistedmovies = $this->mostaddlistedmovies();
        return view('front/sitemap', compact('nbcomm','mostaddlistedmovies'));
    }

    public function gtu()
    {
        $nbcomm = \DB::table('reported_comments')->select(\DB::raw('*'))->count();
        $mostaddlistedmovies = $this->mostaddlistedmovies();
        return view('front/gtu', compact('nbcomm','mostaddlistedmovies'));
    }

    public function charter()
    {
        $nbcomm = \DB::table('reported_comments')->select(\DB::raw('*'))->count();
        $mostaddlistedmovies = $this->mostaddlistedmovies();
        return view('front/charter', compact('nbcomm','mostaddlistedmovies'));
    }




    public function mostaddlistedmovies()
    {
      $mostaddlistedmovies = \DB::table('mylist')
                            ->join('movies', 'movies.id', '=', 'mylist.movie_id')
                            ->groupBy('title')
                            ->orderBy('count','DESC')
                            ->get(['title', \DB::raw('count(title) as count')]);
      return $mostaddlistedmovies;
    }
}
