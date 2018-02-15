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
}
