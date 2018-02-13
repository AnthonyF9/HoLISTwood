<?php

use Illuminate\Database\Seeder;

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $movies =[];
      $date = new DateTime();
      $movies[] = array (
        'title'   =>'Forrest Gump',
        'year'    =>'1994',
        'runtime' =>'142 min',
        'director' =>'Robert Zemeckis',
        'writers'   =>'Winston Groom (novel), Eric Roth (screenplay)',
        'actors'   =>'Tom Hanks, Rebecca Williams, Sally Field, Michael Conner Humphreys',
        'plot'     =>'Forrest Gump is a simple man with a low I.Q. but good intentions. He is running through childhood with his best and only friend Jenny. His \'mama\' teaches him the ways of life and leaves him to choose his destiny. Forrest joins the army for service in Vietnam, finding new friends called Dan and Bubba, he wins medals, creates a famous shrimp fishing fleet, inspires people to jog, starts a ping-pong craze, creates the smiley, writes bumper stickers and songs, donates to people and meets the president several times. However, this is all irrelevant to Forrest who can only think of his childhood sweetheart Jenny Curran, who has messed up her life. Although in the end all he wants to prove is that anyone can love anyone.',
        'awards'    =>'Won 6 Oscars. Another 39 wins & 66 nominations.',
        'poster'    =>'https://images-na.ssl-images-amazon.com/images/M/MV5BNWIwODRlZTUtY2U3ZS00Yzg1LWJhNzYtMmZiYmEyNmU1NjMzXkEyXkFqcGdeQXVyMTQxNzMzNDI@._V1_SX300.jpg',
        'imdb_id'   =>'tt0109830',
        'production' =>'Paramount Pictures',
        'website'    =>'http://www.paramount.com/movies/forrest-gump/',
        'genre'    =>'Drama, Romance',
        'created_at' => $date->format('Y-m-d H:i:s'),
        'updated_at' => $date->format('Y-m-d H:i:s')
      );

      $movies[] = array (
        'title'   =>'Batman',
        'year'    =>'1989',
        'runtime' =>'126 min',
        'director' =>'Tim Burton',
        'writers'   =>'Bob Kane (Batman characters), Sam Hamm (story), Sam Hamm (screenplay), Warren Skaaren (screenplay)',
        'actors'   =>'Michael Keaton, Jack Nicholson, Kim Basinger, Robert Wuhl',
        'plot'     =>'Gotham City. Crime boss Carl Grissom (Jack Palance) effectively runs the town but there\'s a new crime fighter in town - Batman (Michael Keaton). Grissom\'s right-hand man is Jack Napier (Jack Nicholson), a brutal man who is not entirely sane... After falling out between the two Grissom has Napier set up with the Police and Napier falls to his apparent death in a vat of chemicals. However, he soon reappears as The Joker and starts a reign of terror in Gotham City.          Meanwhile, reporter Vicki Vale (Kim Basinger) is in the city to do an article on Batman. She soon starts a relationship with Batman\'s everyday persona, billionaire Bruce Wayne.',
        'awards'    =>'Won 1 Oscar. Another 9 wins & 26 nominations.',
        'poster'    =>'https://images-na.ssl-images-amazon.com/images/M/MV5BMTYwNjAyODIyMF5BMl5BanBnXkFtZTYwNDMwMDk2._V1_SX300.jpg',
        'imdb_id'   =>'tt0096895',
        'production' =>'Warner Bros. Pictures',
        'website'    =>'N/A',
        'genre'    =>'Action, Adventure',
        'created_at' => $date->format('Y-m-d H:i:s'),
        'updated_at' => $date->format('Y-m-d H:i:s')
      );



      DB::table('movies')->insert($movies);
    }
}
