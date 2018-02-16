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
      $trailer[] = [
        'id_movie'    =>3,
        'url_trailer' =>'https://www.youtube.com/embed/r5X-hFf6Bwo',
      ];
        DB::table('trailer')->insert($trailer);
    }
}
