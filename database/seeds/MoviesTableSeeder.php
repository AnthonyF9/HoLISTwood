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
        'created_at' => $date->format('Y-m-d H:i:s')
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
        'created_at' => $date->format('Y-m-d H:i:s')
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
        'created_at' => $date->format('Y-m-d H:i:s')
        'updated_at' => $date->format('Y-m-d H:i:s'),
      );

      DB::table('movies')->insert($movies);
    }
}
