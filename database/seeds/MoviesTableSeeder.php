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
        'title'  => 'ici mon premier titre',
        'year' => 1978,
        'created_at' => $date->format('Y-m-d H:i:s')
      );
      DB::table('movies')->insert($movies);
    }
}