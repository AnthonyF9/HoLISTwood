<?php

use Illuminate\Database\Seeder;

class MovieSuggests extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $suggests =[];
      $date = new DateTime();
      $suggests[] = array (
        'id_user' =>'',
        'title' =>'',
        'year' =>'' ,
        'runtime' =>'' ,
        'director' =>'',
        'writer' =>'' ,
        'actors' =>'' ,
        'plot' =>'' ,
        'awards' =>'' ,
        'poster' =>'',
        'imdb_id' =>'' ,
        'production' =>'',
        'website' =>'' ,
        'trailer' =>'',
        'status' =>'' enum('released','in production')-> default'released',

      );
    }
}
