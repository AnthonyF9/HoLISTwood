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
        'id_user'  =>'',
        'id_movie' =>'',
        'note'     =>'',
      );
        DB::table('rating')->insert($rating);
    }
}
