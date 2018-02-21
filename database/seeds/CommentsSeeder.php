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
        'id_user' =>2 ,
        'id_movie' => 3,
        'content'  => 'testons les commentaires',
        'state'   => 'published',
        'created_at' => $date->format('Y-m-d H:i:s'),
        'updated_at' => $date->format('Y-m-d H:i:s')
      );
      $comments[] = array (
        'id_user' =>1 ,
        'id_movie' => 3,
        'content'  => 'ceci est un commentaire',
        'state'   => 'published',
        'created_at' => $date->format('Y-m-d H:i:s'),
        'updated_at' => $date->format('Y-m-d H:i:s')
      );
      DB::table('comments')->insert($comments);
    }
}
