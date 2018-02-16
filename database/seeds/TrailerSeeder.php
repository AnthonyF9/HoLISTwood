<?php

use Illuminate\Database\Seeder;

class TrailerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $trailer =[];
      $date = new DateTime();
      $trailer[] = array (
        'id_movie'    =>'',
        'url_trailer' =>'',
      );
      DB::table('trailer')->insert($trailer);
    }
}
