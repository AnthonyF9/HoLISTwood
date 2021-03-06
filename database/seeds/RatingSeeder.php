<?php

use Illuminate\Database\Seeder;

class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $rating =[];
      $date = new DateTime();
      $rating[] = array (
        'id_user'  =>2,
        'id_movie' =>1,
        'note'     =>3,
      );
      $rating[] = array (
        'id_user'  =>1,
        'id_movie' =>5,
        'note'     =>4,
      );
      $rating[] = array (
        'id_user'  =>3,
        'id_movie' =>5,
        'note'     =>3,
      );
      DB::table('rating')->insert($rating);
    }
}
