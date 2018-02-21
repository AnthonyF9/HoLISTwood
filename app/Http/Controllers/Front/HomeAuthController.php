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
          $movie = json_decode($raw, true);
          return view('front/submitmovie/submitmovieimdbverif', compact('movie'));
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

          if (!empty($movie)) {
            $trailers = \DB::table('movies')
                        ->join('trailer', 'movies.id', '=', 'trailer.id_movie')
                        ->where('imdb_id','=',$imdb_id)
                        ->get();
            // dd($trailers);
            $liststatus = \DB::table('mylist')
                        ->join('users', 'users.id', '=', 'mylist.user_id')
                        ->join('movies', 'movies.id', '=', 'mylist.movie_id')
                        ->where([
                            ['mylist.user_id', '=', $user_id],
                            ['mylist.movie_id', '=', $movie_id]
                          ])
                        ->get();
            // dd($liststatus[0]);
            return view('front/oneMovie', compact('imdb_id','movie', 'trailers', 'liststatus'));
          }
          else {
            abort(404);
          }
    }
    public function updateinmylist(Request $request, $imdb_id)
    {
          $status = $request->addtolist;
          $user_id = \Auth::user()->id;
          $movie = \DB::table('movies')->where('imdb_id','=',$imdb_id)->get();
          // dd($movie);
          $movie_id = $movie[0]->id;
          // \DB::table('mylist')->update($list);
          $itemlist = \DB::table('mylist')
                      ->where([['movie_id','=',$movie_id],['user_id','=',$user_id]])
                      ->get();
          // dd($itemlist);
          $id = $itemlist[0]->id;
          \DB::table('mylist')->where('id','=',$id)->update([
            'user_id'  => $user_id,
            'movie_id' => $movie_id,
            'statuslist'   => $status
          ]);
          // MyList::findOrFail($id)->update([
          //   'user_id'  => $user_id,
          //   'movie_id' => $movie_id,
          //   'statuslist'   => $status
          // ]);

          if (!empty($movie)) {
            $trailers = \DB::table('movies')
                        ->join('trailer', 'movies.id', '=', 'trailer.id_movie')
                        ->where('imdb_id','=',$imdb_id)
                        ->get();
            // dd($trailers);
            $liststatus = \DB::table('mylist')
                        ->join('users', 'users.id', '=', 'mylist.user_id')
                        ->join('movies', 'movies.id', '=', 'mylist.movie_id')
                        ->where([
                            ['mylist.user_id', '=', $user_id],
                            ['mylist.movie_id', '=', $movie_id]
                          ])
                        ->get();
            // dd($liststatus[0]);
            return view('front/oneMovie', compact('imdb_id','movie', 'trailers', 'liststatus'));
          }
          else {
            abort(404);
          }
    }

    // public function addtomylist(Request $request, $imdb_id)
    // {
    //       $status = $request->addtolist;
    //       $user_id = \Auth::user()->id;
    //       $movie = \DB::table('movies')->where('imdb_id','=',$imdb_id)->get();
    //       $movie_id = $movie[0]->id;
    //       $list = [];
    //       $list[] = [
    //         'user_id'  => $user_id,
    //         'movie_id' => $movie_id,
    //         'statuslist'   => $status
    //       ];
    //       \DB::table('mylist')->insert($list);
    //
    //       if (!empty($movie)) {
    //         $trailers = \DB::table('movies')
    //                     ->join('trailer', 'movies.id', '=', 'trailer.id_movie')
    //                     ->where('imdb_id','=',$imdb_id)
    //                     ->get();
    //         // dd($trailers);
    //         $liststatus = \DB::table('mylist')
    //                     ->join('users', 'users.id', '=', 'mylist.user_id')
    //                     ->join('movies', 'movies.id', '=', 'mylist.movie_id')
    //                     ->where([
    //                         ['mylist.user_id', '=', $user_id],
    //                         ['mylist.movie_id', '=', $movie_id]
    //                       ])
    //                     ->get();
    //         // dd($liststatus[0]);
    //         return view('front/oneMovie', compact('imdb_id','movie', 'trailers', 'liststatus'));
    //       }
    //       else {
    //         abort(404);
    //       }
    // }
    // public function updateinmylist(Request $request, $imdb_id)
    // {
    //       $status = $request->addtolist;
    //       $user_id = \Auth::user()->id;
    //       $movie = \DB::table('movies')->where('imdb_id','=',$imdb_id)->get();
    //       // dd($movie);
    //       $movie_id = $movie[0]->id;
    //       // \DB::table('mylist')->update($list);
    //       $itemlist = \DB::table('mylist')
    //                   ->where([['movie_id','=',$movie_id],['user_id','=',$user_id]])
    //                   ->get();
    //       // dd($itemlist);
    //       $id = $itemlist[0]->id;
    //       \DB::table('mylist')->where('id','=',$id)->update([
    //         'user_id'  => $user_id,
    //         'movie_id' => $movie_id,
    //         'statuslist'   => $status
    //       ]);
    //       // MyList::findOrFail($id)->update([
    //       //   'user_id'  => $user_id,
    //       //   'movie_id' => $movie_id,
    //       //   'statuslist'   => $status
    //       // ]);
    //
    //       if (!empty($movie)) {
    //         $trailers = \DB::table('movies')
    //                     ->join('trailer', 'movies.id', '=', 'trailer.id_movie')
    //                     ->where('imdb_id','=',$imdb_id)
    //                     ->get();
    //         // dd($trailers);
    //         $liststatus = \DB::table('mylist')
    //                     ->join('users', 'users.id', '=', 'mylist.user_id')
    //                     ->join('movies', 'movies.id', '=', 'mylist.movie_id')
    //                     ->where([
    //                         ['mylist.user_id', '=', $user_id],
    //                         ['mylist.movie_id', '=', $movie_id]
    //                       ])
    //                     ->get();
    //         // dd($liststatus[0]);
    //         return view('front/oneMovie', compact('imdb_id','movie', 'trailers', 'liststatus'));
    //       }
    //       else {
    //         abort(404);
    //       }
    // }
}
