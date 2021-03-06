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
      $nbcomm = \DB::table('reported_comments')->select(\DB::raw('*'))->count();
      // Si quelqu'un est connecté sur la page calendrier on affiche les films qu'il a ajouté
       if($user = Auth::user())
       {
         // $userid = \DB::table('mylist')->where('user_id','=', $user->id)->get();

         $movies = \DB::table('movies')->where('release_date','!=','null')->get();

         $usermovies = \DB::table('mylist')
                     ->join('movies', 'movies.id', '=', 'mylist.movie_id')
                     ->where('user_id','=', $user->id)
                     ->where('release_date','!=','null')
                     ->get();

           // dd($usermovies);

          $events = [];
          $data = Event::all();
          if($data->count()) {
            // sorties de tous les films confondus
              $moveinmylist = [];
              foreach ($usermovies as $key => $usermovie) {
                $events[] = Calendar::event(
                    $usermovie->title,
                    true,
                    new \DateTime($usermovie->release_date),
                    new \DateTime($usermovie->release_date.' +1 day'),
                    $usermovie->id,
                    // Add color and link on event
                  [
                      'color' => '#ee0401',
                      'url' => route('oneMovieAuth', array( 'imdb_id'=> $usermovie->imdb_id )),
                  ]
                  );
                  $moveinmylist[] = $usermovie->title;
              }
              // sorties des films ajoutés à sa liste
              foreach ($movies as $key => $movie) {
                if (in_array($movie->title,$moveinmylist) == FALSE) {
                  $events[] = Calendar::event(
                      $movie->title,
                      true,
                      new \DateTime($movie->release_date),
                      new \DateTime($movie->release_date.' +1 day'),
                      $movie->id,
                      // Add color and link on event
                    [
                        'color' => '#3A87AD',
                        'url' => route('oneMovieAuth', array( 'imdb_id'=> $movie->imdb_id )),
                    ]
                  );
                }

              }
          }


           // dd($events);

//            foreach ($events as $event) {
//     echo "<br>titre: ". $event->title . ", couleur: " . $event->options['color'] ;
// }


          // $no_dupes_array = array_unique($events);print_r($no_dupes_array); echo'<br />';



          $calendar = Calendar::addEvents($events);
          // dd($calendar);
          $mostaddlistedmovies = $this->mostaddlistedmovies();
          return view('front/fullcalender', compact('calendar','nbcomm','mostaddlistedmovies'));

       } else {
         // si personne n'est connecté on affiche tous les films qui ont une release date de la base de données

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
                     'url' => route('oneMovie', array( 'imdb_id'=> $movie->imdb_id )),
                 ]
               );
           }
       }
       $calendar = Calendar::addEvents($events);
       // dd($calendar);
       $mostaddlistedmovies = $this->mostaddlistedmovies();
       return view('front/fullcalender', compact('calendar','nbcomm','mostaddlistedmovies'));



     }
   }


   public function mostaddlistedmovies()
   {
     $mostaddlistedmovies = \DB::table('mylist')
                           ->join('movies', 'movies.id', '=', 'mylist.movie_id')
                           ->groupBy('title')
                           ->orderBy('count','DESC')
                           ->get(['title', \DB::raw('count(title) as count')]);
     return $mostaddlistedmovies;
   }
}
