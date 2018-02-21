<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\MovieRequest;
use App\Http\Requests\ImdbRequest;
use App\Http\Requests\FrontMovieRequest;
use App\Movie;
use App\MyList;

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
        $user_id = \Auth::user()->id;
        $mymovieslist = \DB::table('mylist')
                    ->join('users', 'users.id', '=', 'mylist.user_id')
                    ->join('movies', 'movies.id', '=', 'mylist.movie_id')
                    ->where('mylist.user_id', '=', $user_id)
                    ->get();
        // dd($mymovieslist);
        return view('front/profile', compact('mymovieslist'));
        // return view('front/profile');
    }

    public function favorite()
    {
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
      // si l'imdb n'est pas déjà dans le BDD, on l'ajoute
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
          $opts = array(
            'http' => array(
                'method' => "GET"
            )
          );
          $context = stream_context_create($opts);
          $raw = file_get_contents($urlmovie, true, $context);
          $movie1 = json_decode($raw, true);
          $request->session()->put('movie', $movie1);
          $movie = $request->session()->get('movie');
          return view('front/submitmovie/submitmovieimdbverif', compact('movie'));
        } else {
          return redirect()->route('submitmoviebyimdb')->with('error', 'invalid IMDB ID');
        }
    }

    public function verifymoviebyimdb(Request $request)
    {
        $movie = $request->session()->get('movie');
        return view('front/submitmovie/submitmovieimdbverif', compact('movie'));
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


    public function oneMovieAuth($imdb_id)
    {
        $user_id = \Auth::user()->id;
        $movie = \DB::table('movies')->where('imdb_id','=',$imdb_id)->get();
        $movie_id = $movie[0]->id;
        $itemlist = \DB::table('mylist')
                    ->where([['movie_id','=',$movie_id],['user_id','=',$user_id]])
                    ->get();
        $ratinglist = \DB::table('rating')
                    ->where([['id_movie','=',$movie_id],['id_user','=',$user_id]])
                    ->get();
        if (!empty($movie)) {
          $trailers = \DB::table('movies')
                      ->join('trailer', 'movies.id', '=', 'trailer.id_movie')
                      ->where('imdb_id','=',$imdb_id)
                      ->get();
          $liststatus = \DB::table('mylist')
                      ->join('users', 'users.id', '=', 'mylist.user_id')
                      ->join('movies', 'movies.id', '=', 'mylist.movie_id')
                      ->where([
                          ['mylist.user_id', '=', $user_id],
                          ['mylist.movie_id', '=', $movie_id]
                        ])
                      ->get();
          $ratings = \DB::table('movies')
                      ->join('rating', 'movies.id', '=', 'rating.id_movie')
                      ->where('imdb_id','=',$imdb_id)
                      ->get();
          $ratingstatus = \DB::table('rating')
                      ->join('users', 'users.id', '=', 'rating.id_user')
                      ->join('movies', 'movies.id', '=', 'rating.id_movie')
                      ->where([
                          ['rating.id_user', '=', $user_id],
                          ['rating.id_movie', '=', $movie_id]
                        ])
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
          return view('front/oneMovie', compact('imdb_id', 'movie', 'trailers', 'moyrating', 'liststatus','itemlist', 'ratings', 'ratingstatus','ratinglist'));
        } else { abort(404); }
    }


    public function addtomylist(Request $request, $imdb_id)
    {
          $status = $request->addtolist;
          $user_id = \Auth::user()->id;
          $movie = \DB::table('movies')->where('imdb_id','=',$imdb_id)->get();
          $movie_id = $movie[0]->id;
          $list = [];
          $list[] = [
            'user_id'  => $user_id,
            'movie_id' => $movie_id,
            'statuslist'   => $status
          ];
          \DB::table('mylist')->insert($list);
          $itemlist = \DB::table('mylist')
                      ->where([['movie_id','=',$movie_id],['user_id','=',$user_id]])
                      ->get();
          $ratinglist = \DB::table('rating')
                      ->where([['id_movie','=',$movie_id],['id_user','=',$user_id]])
                      ->get();
          if (!empty($movie)) {
            $trailers = \DB::table('movies')
                        ->join('trailer', 'movies.id', '=', 'trailer.id_movie')
                        ->where('imdb_id','=',$imdb_id)
                        ->get();
            $liststatus = \DB::table('mylist')
                        ->join('users', 'users.id', '=', 'mylist.user_id')
                        ->join('movies', 'movies.id', '=', 'mylist.movie_id')
                        ->where([
                            ['mylist.user_id', '=', $user_id],
                            ['mylist.movie_id', '=', $movie_id]
                          ])
                        ->get();
            $ratings = \DB::table('movies')
                        ->join('rating', 'movies.id', '=', 'rating.id_movie')
                        ->where('imdb_id','=',$imdb_id)
                        ->get();
            $ratingstatus = \DB::table('rating')
                        ->join('users', 'users.id', '=', 'rating.id_user')
                        ->join('movies', 'movies.id', '=', 'rating.id_movie')
                        ->where([
                            ['rating.id_user', '=', $user_id],
                            ['rating.id_movie', '=', $movie_id]
                          ])
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
            return view('front/oneMovie', compact('imdb_id','movie', 'moyrating', 'trailers', 'liststatus','itemlist', 'ratings', 'ratingstatus','ratinglist'));
          } else { abort(404); }
    }
    public function updateinmylist(Request $request, $imdb_id)
    {
          $status = $request->addtolist;
          $user_id = \Auth::user()->id;
          $movie = \DB::table('movies')->where('imdb_id','=',$imdb_id)->get();
          $movie_id = $movie[0]->id;
          $itemlist = \DB::table('mylist')
                      ->where([['movie_id','=',$movie_id],['user_id','=',$user_id]])
                      ->get();
          $id = $itemlist[0]->id;
          \DB::table('mylist')->where('id','=',$id)->update([
            'user_id'  => $user_id,
            'movie_id' => $movie_id,
            'statuslist'   => $status
          ]);
          if (!empty($movie)) {
            $trailers = \DB::table('movies')
                        ->join('trailer', 'movies.id', '=', 'trailer.id_movie')
                        ->where('imdb_id','=',$imdb_id)
                        ->get();
            $liststatus = \DB::table('mylist')
                        ->join('users', 'users.id', '=', 'mylist.user_id')
                        ->join('movies', 'movies.id', '=', 'mylist.movie_id')
                        ->where([
                            ['mylist.user_id', '=', $user_id],
                            ['mylist.movie_id', '=', $movie_id]
                          ])
                        ->get();
            $ratings = \DB::table('movies')
                        ->join('rating', 'movies.id', '=', 'rating.id_movie')
                        ->where('imdb_id','=',$imdb_id)
                        ->get();
            $ratingstatus = \DB::table('rating')
                        ->join('users', 'users.id', '=', 'rating.id_user')
                        ->join('movies', 'movies.id', '=', 'rating.id_movie')
                        ->where([
                            ['rating.id_user', '=', $user_id],
                            ['rating.id_movie', '=', $movie_id]
                          ])
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
            return view('front/oneMovie', compact('imdb_id','movie', 'moyrating', 'trailers', 'liststatus', 'ratings', 'ratingstatus'));
          } else { abort(404); }
    }

    public function rate(Request $request, $imdb_id)
    {
          // dd($request->all());
          $rating = $request->rating;
          $user_id = \Auth::user()->id;
          $movie = \DB::table('movies')->where('imdb_id','=',$imdb_id)->get();
          $movie_id = $movie[0]->id;
          $ratingtable = [];
          $ratingtable[] = [
            'id_user'  => $user_id,
            'id_movie' => $movie_id,
            'note'   => $rating
          ];
          // dd($ratingtable);
          \DB::table('rating')->insert($ratingtable);
          $ratinglist = \DB::table('rating')
                      ->where([['id_movie','=',$movie_id],['id_user','=',$user_id]])
                      ->get();
          // dd($ratinglist);
          $itemlist = \DB::table('mylist')
                      ->where([['movie_id','=',$movie_id],['user_id','=',$user_id]])
                      ->get();
          if (!empty($movie)) {
            $ratings = \DB::table('movies')
                        ->join('rating', 'movies.id', '=', 'rating.id_movie')
                        ->where('imdb_id','=',$imdb_id)
                        ->get();
            $ratingstatus = \DB::table('rating')
                        ->join('users', 'users.id', '=', 'rating.id_user')
                        ->join('movies', 'movies.id', '=', 'rating.id_movie')
                        ->where([
                            ['rating.id_user', '=', $user_id],
                            ['rating.id_movie', '=', $movie_id]
                          ])
                        ->get();
            $trailers = \DB::table('movies')
                        ->join('trailer', 'movies.id', '=', 'trailer.id_movie')
                        ->where('imdb_id','=',$imdb_id)
                        ->get();
            $liststatus = \DB::table('mylist')
                        ->join('users', 'users.id', '=', 'mylist.user_id')
                        ->join('movies', 'movies.id', '=', 'mylist.movie_id')
                        ->where([
                            ['mylist.user_id', '=', $user_id],
                            ['mylist.movie_id', '=', $movie_id]
                          ])
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
            return view('front/oneMovie', compact('imdb_id','movie', 'moyrating', 'ratings', 'ratingstatus','ratinglist', 'trailers', 'liststatus','itemlist'));
          } else { abort(404); }
    }
    public function updatemyrating(Request $request, $imdb_id)
    {
          $rating = $request->rating;
          $user_id = \Auth::user()->id;
          $movie = \DB::table('movies')->where('imdb_id','=',$imdb_id)->get();
          $movie_id = $movie[0]->id;
          $ratinglist = \DB::table('rating')
                      ->where([['id_movie','=',$movie_id],['id_user','=',$user_id]])
                      ->get();
          $id = $ratinglist[0]->id;
          \DB::table('rating')->where('id','=',$id)->update([
            'id_user'  => $user_id,
            'id_movie' => $movie_id,
            'note'   => $rating
          ]);
          if (!empty($movie)) {
            $ratings = \DB::table('movies')
                        ->join('rating', 'movies.id', '=', 'rating.id_movie')
                        ->where('imdb_id','=',$imdb_id)
                        ->get();
            $ratingstatus = \DB::table('rating')
                        ->join('users', 'users.id', '=', 'rating.id_user')
                        ->join('movies', 'movies.id', '=', 'rating.id_movie')
                        ->where([
                            ['rating.id_user', '=', $user_id],
                            ['rating.id_movie', '=', $movie_id]
                          ])
                        ->get();
            $trailers = \DB::table('movies')
                        ->join('trailer', 'movies.id', '=', 'trailer.id_movie')
                        ->where('imdb_id','=',$imdb_id)
                        ->get();
            $liststatus = \DB::table('mylist')
                        ->join('users', 'users.id', '=', 'mylist.user_id')
                        ->join('movies', 'movies.id', '=', 'mylist.movie_id')
                        ->where([
                            ['mylist.user_id', '=', $user_id],
                            ['mylist.movie_id', '=', $movie_id]
                          ])
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
            return view('front/oneMovie', compact('imdb_id','movie', 'moyrating', 'ratings', 'ratingstatus', 'trailers', 'liststatus'));
          } else { abort(404); }
    }


}
