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
  public function dashboard()
  {
      return view('back/dashboard');
  }
}
