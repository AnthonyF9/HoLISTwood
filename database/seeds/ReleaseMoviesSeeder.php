<?php

use Illuminate\Database\Seeder;

class ReleaseMoviesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $release =[];
      $date = new DateTime();
      $release[] = array (
        'release_date' =>'2018-04-20',
        'id_movie' =>1,
        'created_at' => $date->format('Y-m-d H:i:s'),
        'updated_at' => $date->format('Y-m-d H:i:s'),
      );
      DB::table('release')->insert($release);
    }
}
