<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\MovieRequest;
use App\Http\Requests\ImdbRequest;
use App\Http\Requests\FrontMovieRequest;
use App\Http\Requests\CommentRequest;
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

    /**
     * [profile description]
     * @return [type] [description]
     */
    public function profile()
    {
        $user_id = \Auth::user()->id;
        $mymovieslist = \DB::table('mylist')
                    ->join('users', 'users.id', '=', 'mylist.user_id')
                    ->join('movies', 'movies.id', '=', 'mylist.movie_id')
                    ->where('mylist.user_id', '=', $user_id)
                    ->get();
        return view('front/profile', compact('mymovieslist'));
    }

    /**
     * [favorite description]
     * @return [type] [description]
     */
    public function favorite()
    {
        return view('front/favorite',compact('movies'));
    }

    /**
     * [submitmoviebyitems description]
     * @return [type] [description]
     */
    public function submitmoviebyitems()
    {
        return view('front/submitmovie/submitmoviebyitems');
    }

    /**
     * [submitmovieaction description]
     * @param  FrontMovieRequest $request [description]
     * @return [type]                     [description]
     */
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

    /**
     * [submitmoviebyimdb description]
     * @return [type] [description]
     */
    public function submitmoviebyimdb()
    {
        return view('front/submitmovie/submitmoviebyimdb');
    }

    /**
     * [findmoviebyimdb description]
     * @param  ImdbRequest $request [description]
     * @return [type]               [description]
     */
    public function findmoviebyimdb(ImdbRequest $request)
    {
        $urlmovie = 'http://www.omdbapi.com/?i='. $request->imdb . '&apikey=1f275ea3&plot=full';
        // 1f275ea3
        // 67f441c
        // vérification de la syntaxe de l'IMDB
        if (substr( $request->imdb, 0, 2 ) === "tt" &&  strlen($request->imdb) === 9 ) {
          $opts = array('http' => array('method' => "GET"));
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

    /**
     * [verifymoviebyimdb description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function verifymoviebyimdb(Request $request)
    {
        $movie = $request->session()->get('movie');
        return view('front/submitmovie/submitmovieimdbverif', compact('movie'));
    }

    /**
     * [addmoviebyimdb description]
     * @param  MovieRequest $request [description]
     * @return [type]                [description]
     */
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

    /**
     * [oneMovieAuth description]
     * @param  [type] $imdb_id [description]
     * @return [type]          [description]
     */
    public function oneMovieAuth($imdb_id)
    {
        $user_id = \Auth::user()->id;
        $movie = \DB::table('movies')->where('imdb_id','=',$imdb_id)->get();
        if (isset($movie[0])) {
          $movie_id = $movie[0]->id;
          $itemlist = $this->itemlist($movie_id,$user_id);
          $ratinglist = $this->ratinglist($movie_id,$user_id);
          if (!empty($movie) && $movie[0]->moderation != 'softdelete') {
            $trailers = $this->trailers($imdb_id);
            $liststatus = $this->liststatus($user_id,$movie_id);
            $ratings = $this->ratings($imdb_id);
            $ratingstatus = $this->ratingstatus($user_id,$movie_id);
            $moyrating = $this->moyrating($imdb_id);
            $allcomments = $this->allcomments($imdb_id);
            $thiscomment = 0;
            return view('front/oneMovie', compact('imdb_id', 'movie', 'trailers', 'moyrating', 'liststatus','itemlist', 'ratings', 'ratingstatus','ratinglist', 'allcomments', 'thiscomment'));
          } else { abort(404); }
        } else { abort(404); }
    }

    /**
     * [addtomylist description]
     * @param  Request $request [description]
     * @param  [type]  $imdb_id [description]
     * @return [type]           [description]
     */
    public function addtomylist(Request $request, $imdb_id)
    {
          $status = $request->addtolist;
          $user_id = \Auth::user()->id;
          $movie = \DB::table('movies')->where('imdb_id','=',$imdb_id)->get();
          $movie_id = $movie[0]->id;
          $list = [];
          $list[] = ['user_id' => $user_id, 'movie_id' => $movie_id, 'statuslist' => $status];
          \DB::table('mylist')->insert($list);
          $itemlist = $this->itemlist($movie_id,$user_id);
          $ratinglist = $this->ratinglist($movie_id,$user_id);
          if (!empty($movie)) {
            $trailers = $this->trailers($imdb_id);
            $liststatus = $this->liststatus($user_id,$movie_id);
            $ratings = $this->ratings($imdb_id);
            $ratingstatus = $this->ratingstatus($user_id,$movie_id);
            $moyrating = $this->moyrating($imdb_id);
            $allcomments = $this->allcomments($imdb_id);
            $thiscomment = 0;
            return view('front/oneMovie', compact('imdb_id','movie', 'moyrating', 'trailers', 'liststatus','itemlist', 'ratings', 'ratingstatus','ratinglist', 'allcomments', 'thiscomment'));
          } else { abort(404); }
    }

    /**
     * [updateinmylist description]
     * @param  Request $request [description]
     * @param  [type]  $imdb_id [description]
     * @return [type]           [description]
     */
    public function updateinmylist(Request $request, $imdb_id)
    {
          $status = $request->addtolist;
          $user_id = \Auth::user()->id;
          $movie = \DB::table('movies')->where('imdb_id','=',$imdb_id)->get();
          $movie_id = $movie[0]->id;
          $itemlist = $this->itemlist($movie_id,$user_id);
          $id = $itemlist[0]->id;
          \DB::table('mylist')->where('id','=',$id)->update(['user_id' => $user_id, 'movie_id' => $movie_id, 'statuslist' => $status]);
          if (!empty($movie)) {
            $trailers = $this->trailers($imdb_id);
            $liststatus = $this->liststatus($user_id,$movie_id);
            $ratings = $this->ratings($imdb_id);
            $ratingstatus = $this->ratingstatus($user_id,$movie_id);
            $moyrating = $this->moyrating($imdb_id);
            $allcomments = $this->allcomments($imdb_id);
            $thiscomment = 0;
            return view('front/oneMovie', compact('imdb_id','movie', 'moyrating', 'trailers', 'liststatus', 'ratings', 'ratingstatus', 'allcomments', 'thiscomment'));
          } else { abort(404); }
    }

    /**
     * [rate description]
     * @param  Request $request [description]
     * @param  [type]  $imdb_id [description]
     * @return [type]           [description]
     */
    public function rate(Request $request, $imdb_id)
    {
          $rating = $request->rating;
          $user_id = \Auth::user()->id;
          $movie = \DB::table('movies')->where('imdb_id','=',$imdb_id)->get();
          $movie_id = $movie[0]->id;
          $list = [];
          $list[] = ['user_id' => $user_id, 'movie_id' => $movie_id, 'statuslist' => 'completed'];
          \DB::table('mylist')->insert($list);
          $ratingtable = [];
          $ratingtable[] = ['id_user' => $user_id, 'id_movie' => $movie_id, 'note' => $rating];
          \DB::table('rating')->insert($ratingtable);
          $ratinglist = $this->ratinglist($movie_id,$user_id);
          $itemlist = $this->itemlist($movie_id,$user_id);
          if (!empty($movie)) {
            $ratings = $this->ratings($imdb_id);
            $ratingstatus = $this->ratingstatus($user_id,$movie_id);
            $trailers = $this->trailers($imdb_id);
            $liststatus = $this->liststatus($user_id,$movie_id);
            $moyrating = $this->moyrating($imdb_id);
            $allcomments = $this->allcomments($imdb_id);
            $thiscomment = 0;
            return view('front/oneMovie', compact('imdb_id','movie', 'moyrating', 'ratings', 'ratingstatus','ratinglist', 'trailers', 'liststatus','itemlist', 'allcomments', 'thiscomment'));
          } else { abort(404); }
    }

    /**
     * [updatemyrating description]
     * @param  Request $request [description]
     * @param  [type]  $imdb_id [description]
     * @return [type]           [description]
     */
    public function updatemyrating(Request $request, $imdb_id)
    {
          $rating = $request->rating;
          $user_id = \Auth::user()->id;
          $movie = \DB::table('movies')->where('imdb_id','=',$imdb_id)->get();
          $movie_id = $movie[0]->id;
          $ratinglist = $this->ratinglist($movie_id,$user_id);
          $id = $ratinglist[0]->id;
          \DB::table('rating')->where('id','=',$id)->update(['id_user'  => $user_id, 'id_movie' => $movie_id, 'note' => $rating]);
          if (!empty($movie)) {
            $ratings = $this->ratings($imdb_id);
            $ratingstatus = $this->ratingstatus($user_id,$movie_id);
            $trailers = $this->trailers($imdb_id);
            $liststatus = $this->liststatus($user_id,$movie_id);
            $moyrating = $this->moyrating($imdb_id);
            $allcomments = $this->allcomments($imdb_id);
            $thiscomment = 0;
            return view('front/oneMovie', compact('imdb_id','movie', 'moyrating', 'ratings', 'ratingstatus', 'trailers', 'liststatus', 'allcomments', 'thiscomment'));
          } else { abort(404); }
    }

    /**
     * [postcomment description]
     * @param  CommentRequest $request [description]
     * @param  [type]         $imdb_id [description]
     * @return [type]                  [description]
     */
    public function postcomment(CommentRequest $request, $imdb_id)
    {
          $comment = $request->comment;
          $user_id = \Auth::user()->id;
          $movie = \DB::table('movies')->where('imdb_id','=',$imdb_id)->get();
          $movie_id = $movie[0]->id;
          $newcomment = [];
          $date = new \DateTime();
          $newcomment[] = [
            'id_user'   => $user_id,
            'id_movie'  => $movie_id,
            'content'   => $comment,
            'created_at'=> $date->format('Y-m-d H:i:s'),
            'updated_at'=> $date->format('Y-m-d H:i:s')
          ];
          \DB::table('comments')->insert($newcomment);
          $ratinglist = $this->ratinglist($movie_id,$user_id);
          $itemlist = $this->itemlist($movie_id,$user_id);
          if (!empty($movie)) {
            $ratings = $this->ratings($imdb_id);
            $ratingstatus = $this->ratingstatus($user_id,$movie_id);
            $trailers = $this->trailers($imdb_id);
            $liststatus = $this->liststatus($user_id,$movie_id);
            $moyrating = $this->moyrating($imdb_id);
            $allcomments = $this->allcomments($imdb_id);
            $thiscomment = 0;
            $idcommentpre = \DB::table('comments')->select('id')->where('created_at','=',$date->format('Y-m-d H:i:s'))->get();
            $idcomment = $idcommentpre[0]->id;
            return redirect()->to(route('oneMovieAuth', compact('imdb_id','movie', 'moyrating', 'ratings', 'ratingstatus','ratinglist', 'trailers', 'liststatus','itemlist', 'allcomments', 'thiscomment')).'#comment'.$idcomment);
          } else { abort(404); }
    }


    public function updatecomment($imdb_id, $idcomment)
    {
          $thiscomment = \DB::table('comments')->where('id','=',$idcomment)->get();
          $user_id = $thiscomment[0]->id;
          $movie = \DB::table('movies')->where('imdb_id','=',$imdb_id)->get();
          $movie_id = $movie[0]->id;
          $date = new \DateTime();
          $ratinglist = $this->ratinglist($movie_id,$user_id);
          $itemlist = $this->itemlist($movie_id,$user_id);
          // dd($thiscomment[0]);
          if (!empty($movie)) {
            $ratings = $this->ratings($imdb_id);
            $ratingstatus = $this->ratingstatus($user_id,$movie_id);
            $trailers = $this->trailers($imdb_id);
            $liststatus = $this->liststatus($user_id,$movie_id);
            $moyrating = $this->moyrating($imdb_id);
            $allcomments = $this->allcomments($imdb_id);
            return redirect()->route('oneMovieAuthEditComment', compact('imdb_id','idcomment'));
            // return view('front/oneMovie', compact('imdb_id','movie', 'moyrating', 'ratings', 'ratingstatus', 'trailers', 'liststatus', 'allcomments','thiscomment'));
          } else { abort(404); }
    }

    public function oneMovieAuthEditComment($imdb_id, $idcomment)
    {
        $thiscomment = \DB::table('comments')->where('id','=',$idcomment)->get();
        $user_id = $thiscomment[0]->id;
        $movie = \DB::table('movies')->where('imdb_id','=',$imdb_id)->get();
        $movie_id = $movie[0]->id;
        $itemlist = $this->itemlist($movie_id,$user_id);
        $ratinglist = $this->ratinglist($movie_id,$user_id);
        if (!empty($movie)) {
          $trailers = $this->trailers($imdb_id);
          $liststatus = $this->liststatus($user_id,$movie_id);
          $ratings = $this->ratings($imdb_id);
          $ratingstatus = $this->ratingstatus($user_id,$movie_id);
          $moyrating = $this->moyrating($imdb_id);
          $allcomments = $this->allcomments($imdb_id);
          // dd($allcomments);
          return view('front/oneMovie', compact('imdb_id','movie', 'moyrating', 'ratings', 'ratingstatus','ratinglist', 'trailers', 'liststatus','itemlist', 'allcomments','thiscomment'));
        } else { abort(404); }
    }


    public function updatecommentaction(CommentRequest $request, $imdb_id, $idcomment)
    {
          $content= $request->comment;
          $user_id = \Auth::user()->id;
          $movie = \DB::table('movies')->where('imdb_id','=',$imdb_id)->get();
          $movie_id = $movie[0]->id;
          $date = new \DateTime();
          $ratinglist = $this->ratinglist($movie_id,$user_id);
          $itemlist = $this->itemlist($movie_id,$user_id);
          \DB::table('comments')->where('id','=',$idcomment)->update(['content' => $content, 'updated_at'=> $date->format('Y-m-d H:i:s')]);
          if (!empty($movie)) {
            $ratings = $this->ratings($imdb_id);
            $ratingstatus = $this->ratingstatus($user_id,$movie_id);
            $trailers = $this->trailers($imdb_id);
            $liststatus = $this->liststatus($user_id,$movie_id);
            $moyrating = $this->moyrating($imdb_id);
            $allcomments = $this->allcomments($imdb_id);
            $thiscomment = 0;
            return redirect()->to(route('oneMovieAuth', compact('imdb_id','movie', 'moyrating', 'ratings', 'ratingstatus','ratinglist', 'trailers', 'liststatus','itemlist', 'allcomments', 'thiscomment')).'#comment'.$idcomment);
          } else { abort(404); }
    }



    ////////////////////////////////////////////////////////////////////////////
    // Toutes les fonctions utilisées par le controller, pour la vue oneMovie //
    ////////////////////////////////////////////////////////////////////////////
    public function ratinglist($movie_id,$user_id) {
      $ratinglist = \DB::table('rating')->where([['id_movie','=',$movie_id],['id_user','=',$user_id]])->get();
      return $ratinglist;
    }
    public function itemlist($movie_id,$user_id) {
      $itemlist = \DB::table('mylist')->where([['movie_id','=',$movie_id],['user_id','=',$user_id]])->get();
      return $itemlist;
    }
    public function ratings($imdb_id) {
      $ratings = \DB::table('movies')->join('rating', 'movies.id', '=', 'rating.id_movie')->where('imdb_id','=',$imdb_id)->get();
      return $ratings;
    }
    public function ratingstatus($user_id,$movie_id) {
      $ratingstatus = \DB::table('rating')->join('users', 'users.id', '=', 'rating.id_user')->join('movies', 'movies.id', '=', 'rating.id_movie')
                      ->where([['rating.id_user', '=', $user_id],['rating.id_movie', '=', $movie_id]])->get();
      return $ratingstatus;
    }
    public function trailers($imdb_id) {
      $trailers = \DB::table('movies')->join('trailer', 'movies.id', '=', 'trailer.id_movie')->where('imdb_id','=',$imdb_id)->get();
      return $trailers;
    }
    public function liststatus($user_id,$movie_id) {
      $liststatus = \DB::table('mylist')->join('users', 'users.id', '=', 'mylist.user_id')->join('movies', 'movies.id', '=', 'mylist.movie_id')
                  ->where([['mylist.user_id', '=', $user_id],['mylist.movie_id', '=', $movie_id]])->get();
      return $liststatus;
    }
    public function moyrating($imdb_id) {
      $allratings = \DB::table('movies')->select('movies.title','rating.id_user','rating.id_movie','rating.id_user','rating.note')
                   ->join('rating', 'movies.id', '=', 'rating.id_movie')->where('imdb_id','=',$imdb_id)->get();
      $rating = [];
      foreach ($allratings as $key => $value) {  $rating[] = $value->note; }
      if (!empty($rating)) { $moyrating = round(array_sum($rating)/count($rating),1); }
      else {  $moyrating = ''; }
      return $moyrating;
    }
    public function allcomments($imdb_id) {
      $allcomments = \DB::table('comments')
                  ->select('comments.id','comments.id_user','comments.id_movie','comments.content','comments.content','comments.created_at','comments.updated_at','users.name')
                  ->join('movies', 'movies.id', '=', 'comments.id_movie')->join('users', 'users.id', '=', 'comments.id_user')
                  ->where('imdb_id','=',$imdb_id)->orderBy('created_at','DESC')->get();
      return $allcomments;
    }



}
