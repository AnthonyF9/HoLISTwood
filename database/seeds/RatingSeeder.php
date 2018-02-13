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
      $suggests =[];
      $date = new DateTime();
      $suggests[] = array (
        'id_user'  =>'',
        'id_movie' =>'',
        'note'     =>'',
      );
    }
}
