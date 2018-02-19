<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

         $this->call(AddDummyEvent::class);
         $this->call(CommentsSeeder::class);
         $this->call(MoviesTableSeeder::class);
         $this->call(RatingSeeder::class);
         $this->call(TrailerSeeder::class);
         $this->call(UsersMoviesListSeeder::class);
         $this->call(UsersSeeder::class);

    }
}
