<?php

use Illuminate\Database\Seeder;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $comments =[];
      $date = new DateTime();
      $comments[] = array (
        'id_user' =>'' ,
        'id_movie' => '',
        'content'  => '',
        'status'   => 'out',
        'created_at' => $date->format('Y-m-d H:i:s')
        'updated_at' => $date->format('Y-m-d H:i:s')
      );
      DB::table('comments')->insert($comments);
    }
}
