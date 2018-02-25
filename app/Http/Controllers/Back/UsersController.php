<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use App\User;
use Carbon\Carbon;
use \DB;


class UsersController extends Controller
{
  public function userslist()
  {
    $users = User::orderBy('created_at','desc')->paginate(6);
    return view('back/users/users-list', compact('users'));
  }
  public function edituser($id)
  {
    $user = User::findOrFail($id);
    return view('back/users/update-user', compact('id', 'user'));
  }
  public function edituseraction(UserRequest $request, $id)
  {
    User::findOrFail($id)->update($request->all());
    return redirect()->route('userslist')->with('status', 'User edited');
  }
  public function usersreported()
  {
    $reportedusers = \DB::table('asking_bannish_user')->join('users', 'users.id', '=', 'asking_bannish_user.id_user_reported')->paginate(6);
    return view('back/users/users-reported', compact('reportedusers'));
  }
  public function editreporteduser($id)
  {
    $user = User::findOrFail($id);
    return view('back/users/update-user-reported', compact('id', 'user'));
  }
  public function edituserreportedaction(UserRequest $request, $id)
  {
    User::findOrFail($id)->update($request->all());
    \DB::table('asking_bannish_user')->select('id','=',$id)->delete();
    return redirect()->route('usersreported')->with('status', 'User edited');
  }
  public function dontban(Request $request)
  {
    \DB::table('asking_bannish_user')->select('id','=',$request->user_id)->delete();
    return redirect()->route('usersreported')->with('status', 'User saved');
  }
  public function ban(Request $request)
  {
    User::findOrFail($request->user_id)->update(['role'=>'banned']);
    \DB::table('asking_bannish_user')->select('id','=',$request->user_id)->delete();
    return redirect()->route('usersreported')->with('status', 'User banned');
  }
}
