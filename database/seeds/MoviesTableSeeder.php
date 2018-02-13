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
<<<<<<< HEAD
        'status' => 'out',
=======
        'status'  => 'out',
>>>>>>> 6ad7d57e9e44676b65f4feac8ec663ca36035e47
        'created_at' => $date->format('Y-m-d H:i:s'),
        'updated_at' => $date->format('Y-m-d H:i:s'),
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
<<<<<<< HEAD
        'status' => 'out',
=======
        'status'  => 'out',
>>>>>>> 6ad7d57e9e44676b65f4feac8ec663ca36035e47
        'created_at' => $date->format('Y-m-d H:i:s'),
        'updated_at' => $date->format('Y-m-d H:i:s'),
      );



    $movies[] = array (


        'title'  => 'The Lord of the Rings: The Return of the King',
        'year' => 2003,
        'runtime' => '201 min',
        'director' => 'Peter Jackson',
        'writers' => 'J.R.R. Tolkien (novel), Fran Walsh (screenplay), Philippa Boyens (screenplay), Peter Jackson (screenplay)',
        'actors' => 'Noel Appleby, Ali Astin, Sean Astin, David Aston',
        'plot' => 'The final confrontation between the forces of good and evil fighting for control of the future of Middle-earth. Hobbits: Frodo and Sam reach Mordor in their quest to destroy the "one ring", while Aragorn leads the forces of good against Sauron\'s evil army at the stone city of Minas Tirith.',
        'awards' => 'Won 11 Oscars. Another 197 wins & 122 nominations.',
        'poster' => 'https://images-na.ssl-images-amazon.com/images/M/MV5BYWY1ZWQ5YjMtMDE0MS00NWIzLWE1M2YtODYzYTk2OTNlYWZmXkEyXkFqcGdeQXVyNDUyOTg3Njg@._V1_SX300.jpg',
        'imdb_id' => 'tt0167260',
        'production' => 'New Line Cinema',
        'website' => 'http://www.lordoftherings.net/',
        'genre' => 'Adventure, Drama, Fantasy',
        'status' => 'out',
        'created_at' => $date->format('Y-m-d H:i:s'),
        'updated_at' => $date->format('Y-m-d H:i:s'),
      );

      $movies[] = array (
        'title'  => 'Interstellar',
        'year' => 2014,
        'runtime' => '169 min',
        'director' => 'Christopher Nolan',
        'writers' => 'Jonathan Nolan, Christopher Nolan',
        'actors' => 'Ellen Burstyn, Matthew McConaughey, Mackenzie Foy, John Lithgow',
        'plot' => 'Earth\'s future has been riddled by disasters, famines, and droughts. There is only one way to ensure mankind\'s survival: Interstellar travel. A newly discovered wormhole in the far reaches of our solar system allows a team of astronauts to go where no man has gone before, a planet that may have the right environment to sustain human life.',
        'awards' => 'Won 1 Oscar. Another 43 wins & 143 nominations.',
        'poster' => 'https://images-na.ssl-images-amazon.com/images/M/MV5BZjdkOTU3MDktN2IxOS00OGEyLWFmMjktY2FiMmZkNWIyODZiXkEyXkFqcGdeQXVyMTMxODk2OTU@._V1_SX300.jpg',
        'imdb_id' => 'tt0816692',
        'production' => 'Paramount Pictures',
        'website' => 'http://www.InterstellarMovie.com/',
        'genre' => 'Adventure, Drama, Sci-Fi',
        'status' => 'out',
        'created_at' => $date->format('Y-m-d H:i:s'),
        'updated_at' => $date->format('Y-m-d H:i:s'),
      );

      $movies[] = array (
        'title'  => 'Inception',
        'year' => 2010,
        'runtime' => '148 min',
        'director' => 'Christopher Nolan',
        'writers' => 'Christopher Nolan',
        'actors' => 'Leonardo DiCaprio, Joseph Gordon-Levitt, Ellen Page, Tom Hardy',
        'plot' => 'Dom Cobb is a skilled thief, the absolute best in the dangerous art of extraction, stealing valuable secrets from deep within the subconscious during the dream state, when the mind is at its most vulnerable. Cobb\'s rare ability has made him a coveted player in this treacherous new world of corporate espionage, but it has also made him an international fugitive and cost him everything he has ever loved. Now Cobb is being offered a chance at redemption. One last job could give him his life back but only if he can accomplish the impossible - inception. Instead of the perfect heist, Cobb and his team of specialists have to pull off the reverse: their task is not to steal an idea but to plant one. If they succeed, it could be the perfect crime. But no amount of careful planning or expertise can prepare the team for the dangerous enemy that seems to predict their every move. An enemy that only Cobb could have seen coming.',
        'awards' => 'Won 4 Oscars. Another 152 wins & 204 nominations.',
        'poster' => 'https://images-na.ssl-images-amazon.com/images/M/MV5BMjAxMzY3NjcxNF5BMl5BanBnXkFtZTcwNTI5OTM0Mw@@._V1_SX300.jpg',
        'imdb_id' => 'tt1375666',
        'production' => 'Warner Bros. Pictures',
        'website' => 'http://inceptionmovie.warnerbros.com/',
        'genre' => 'Action, Adventure, Sci-Fi',
        'status' => 'out',
        'created_at' => $date->format('Y-m-d H:i:s'),
        'updated_at' => $date->format('Y-m-d H:i:s'),
      );
      
      DB::table('movies')->insert($movies);
    }
}
