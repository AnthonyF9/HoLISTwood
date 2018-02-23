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
        $this->middleware('admin');
    }



}
