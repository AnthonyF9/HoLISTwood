<?php

use Illuminate\Database\Seeder;

class ReportedCommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $reported_comment =[];
      $reported_comment[] = array (
        'id_movie' => 3,
        'id_comment' => 1,
        'id_user_reported' => 2,
        'id_user_reportman' => 1
      );
      DB::table('reported_comments')->insert($reported_comment);
    }
}
