<?php

use Illuminate\Database\Seeder;

class MovieGenreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $moviegenre =[];
      $date = new DateTime();
      $moviegenre[] = array (
        'id'  => '',
        'id_movie' =>'' ,
        'id_categorie'
        'created_at' => $date->format('Y-m-d H:i:s')
      );
    }
}
