<?php

use Illuminate\Database\Seeder;

class UsersMoviesListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $list =[];

      $list[] = array (
        'user_id'   => 3,
        'movie_id'  => 5,
        'statuslist'    => 'plan to watch'
      );
      $list[] = array (
        'user_id'   => 3,
        'movie_id'  => 4,
        'statuslist'    => 'completed'
      );
      $list[] = array (
        'user_id'   => 3,
        'movie_id'  => 2,
        'statuslist'    => 'plan to watch'
      );
      $list[] = array (
        'user_id'   => 1,
        'movie_id'  => 5,
        'statuslist'    => 'plan to watch'
      );
      $list[] = array (
        'user_id'   => 1,
        'movie_id'  => 2,
        'statuslist'    => 'plan to watch'
      );
      $list[] = array (
        'user_id'   => 2,
        'movie_id'  => 8,
        'statuslist'    => 'plan to watch'
      );

      DB::table('mylist')->insert($list);
    }
}
