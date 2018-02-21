<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Calendar;
use App\Event;
use App\Movie;
use Auth;

class EventController extends Controller
{
  /**
   * [index description]
   */
  public function index()
   {


       // if($user = Auth::user())
       // {
         // $userid = \DB::table('mylist')->where('user_id','=', $user->id)->get();

         // $usermovies = \DB::table('mylist')
         //             ->join('movies', 'movies.id', '=', 'mylist.movie_id')
         //             ->where('user_id','=', $user->id)
         //             ->where('release_date','!=','null')
         //             ->get();


           // dd($usermovies);

       //
       //    $events = [];
       //    $data = Event::all();
       //    if($data->count()) {
       //        foreach ($usermovies as $key => $usermovie) {
       //            $events[] = Calendar::event(
       //                $usermovie->title,
       //                true,
       //                new \DateTime($usermovie->release_date),
       //                new \DateTime($usermovie->release_date.' +1 day'),
       //                null,
       //                // Add color and link on event
       //              [
       //                  'color' => '#EE0401',
       //                  'url' => route('oneMovie', array( 'imdb_id'=> $usermovie->imdb_id )),
       //              ]
       //            );
       //        }
       //    }
       //    $calendar = Calendar::addEvents($events);
       //    // dd($calendar);
       //    return view('front/fullcalender', compact('calendar', 'calendar2'));
       //
       // } else {
       //
       ////////////////////////////////////////////////////////////////////////////////////////////////////////
       // si personne n'est connecté on affiche tous les films qui ont une release date de la base de données
       ////////////////////////////////////////////////////////////////////////////////////////////////////////

       $user_id = \Auth::user()->id;
       $mymovieslist = \DB::table('mylist')
                   ->join('users', 'users.id', '=', 'mylist.user_id')
                   ->join('movies', 'movies.id', '=', 'mylist.movie_id')
                   ->where('mylist.user_id', '=', $user_id)
                   ->get();
       // dd($mymovieslist)

       $movies = \DB::table('movies')->where('release_date','!=','null')->get();
       // dd($movies);

       $events = [];
       $data = Event::all();
       if($data->count()) {
           foreach ($movies as $key => $movie) {
               $events[] = Calendar::event(
                   $movie->title,
                   true,
                   new \DateTime($movie->release_date),
                   new \DateTime($movie->release_date.' +1 day'),
                   null,
                   // Add color and link on event
                 [
                     'color' => '#3A87AD',
                     if (condition) {
                       # code...
                     }
                     'url' => route('oneMovie', array( 'imdb_id'=> $movie->imdb_id )),
                 ]
               );
           }
       }
       $calendar = Calendar::addEvents($events);
       // dd($calendar);
       return view('front/fullcalender', compact('calendar'));



     }
   }
// }
