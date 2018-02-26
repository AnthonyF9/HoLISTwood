<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\MovieRequest;
use App\Http\Requests\ImdbRequest;
use App\Http\Requests\FrontMovieRequest;
use App\Http\Requests\CommentRequest;
use App\Http\Requests\BanRequest;
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
      $reportedcomments = \DB::table('reported_comments')->select('reported_comments.id_comment','reported_comments.id_user_reportman','reported_comments.id_user_reported','comments.id','comments.content','reported_comments.id_movie','comments.state','comments.created_at','comments.updated_at','ug.name AS user_reported','ua.name AS user_reportman','movies.title','movies.imdb_id')->join('users AS ug', 'ug.id', '=', 'reported_comments.id_user_reported')->join('users AS ua', 'ua.id', '=', 'reported_comments.id_user_reportman')->join('movies', 'movies.id', '=', 'reported_comments.id_movie')->join('comments', 'comments.id', '=', 'reported_comments.id_comment')->where('state','=','waiting moderation')->get();
      $reportedusers = \DB::table('asking_bannish_user')->get();
      $nbcomm = \DB::table('reported_comments')->select(\DB::raw('*'))->count();
      return view('front/mod/allreportedcomments', compact('reportedcomments','reportedusers','nbcomm'));
    }
    public function commentIsOk(Request $request)
    {
      \DB::table('reported_comments')->where('id_comment','=',$request->reportedcomment_id)->delete();
      \DB::table('comments')->where('id','=',$request->reportedcomment_id)->update(['state'=>'published']);
      return redirect()->route('allreportedcomments');
    }
    public function deleteComment(Request $request)
    {
      \DB::table('reported_comments')->where('id_comment','=',$request->reportedcomment_id)->delete();
      \DB::table('comments')->where('id','=',$request->reportedcomment_id)->update(['state'=>'deleted']);
      return redirect()->route('allreportedcomments');
    }

    public function askingbannishuser(BanRequest $request)
    {
      $name_user_reported = $request->name_user_reported;
      $user = \DB::table('users')->where('name','=',$name_user_reported)->get();
      if (isset($user[0])) {
        $id_user_reported = $user[0]->id;
        $id_mod = \Auth::user()->id;
        $name_mod = \Auth::user()->name;
        \DB::table('asking_bannish_user')->insert(['id_user_reported'=>$id_user_reported,'name_user_reported'=>$name_user_reported,'id_mod'=>$id_mod,'name_mod'=>$name_mod,'why'=>$request->why]);
        return redirect()->route('allreportedcomments')->with('status', 'User reported');
      } else {
        return redirect()->route('allreportedcomments')->with('error', 'This user does not exist');
      }
    }








}
