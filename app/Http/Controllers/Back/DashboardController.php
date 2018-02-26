<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Http\Requests\MovieRequest;
use App\Http\Requests\ImdbRequest;
use App\Http\Controllers\Controller;
use App\Movie;
use Carbon\Carbon;
use \DB;


class DashboardController extends Controller
{
  public function __construct() {
    $this->middleware('auth');
    $this->middleware('admin');
  }
  public function dashboard()
  {
      $movies = Movie::where('moderation', '=', 'ok')->get();
      $totalmovies = count($movies);
      $mostaddlistedmovies = \DB::table('mylist')
                            ->join('movies', 'movies.id', '=', 'mylist.movie_id')
                            ->groupBy('title')
                            ->orderBy('count','DESC')
                            ->get(['title', DB::raw('count(title) as count')]);
      $mostactiveusersincomments = \DB::table('comments')
                                    ->join('users', 'users.id', '=', 'comments.id_user')
                                    ->groupBy('name')
                                    ->orderBy('count','DESC')
                                    ->get(['name', DB::raw('count(name) as count')]);
      return view('back/dashboard',compact('totalmovies','mostaddlistedmovies','mostactiveusersincomments'));
  }
}
