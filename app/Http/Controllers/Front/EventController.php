<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Calendar;
use App\Event;
use App\Movie;

class EventController extends Controller
{
  public function index()
   {
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
                     'url' => '',
                 ]
               );
           }
       }
       $calendar = Calendar::addEvents($events);
       return view('front/fullcalender', compact('calendar'));

   }
}
