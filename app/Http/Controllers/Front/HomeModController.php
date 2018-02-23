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

class HomeModController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('mod');
    }
    public function allreportedcomments()
    {
      $reportedcomments = \DB::table('comments')->select('comments.id','comments.content','comments.id_user','comments.id_movie','comments.state','comments.created_at','comments.updated_at','users.name','movies.title','movies.imdb_id')->join('users', 'users.id', '=', 'comments.id_user')->join('movies', 'movies.id', '=', 'comments.id_movie')->where('state','=','waiting moderation')->get();
      return view('front/mod/allreportedcomments', compact('reportedcomments'));
    }








}
