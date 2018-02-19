<?php

use Illuminate\Database\Seeder;

class AddDummyEvent extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $data = [
         	    ['title'=>'Demo Event-1', 'start_date'=>'2018-02-19', 'end_date'=>'2018-02-19'],
         	    ['title'=>'Demo Event-2', 'start_date'=>'2018-02-21', 'end_date'=>'2017-02-21'],
              ['title'=>'Demo Event-2-2', 'start_date'=>'2018-02-21', 'end_date'=>'2017-02-21'],
              ['title'=>'Demo Event-2-3', 'start_date'=>'2018-02-21', 'end_date'=>'2017-02-21'],
              ['title'=>'Demo Event-2-4', 'start_date'=>'2018-02-21', 'end_date'=>'2017-02-21'],
              ['title'=>'Demo Event-2-5', 'start_date'=>'2018-02-21', 'end_date'=>'2017-02-21'],
         	    ['title'=>'Demo Event-3', 'start_date'=>'2017-09-14', 'end_date'=>'2017-09-14'],
         	    ['title'=>'Demo Event-3', 'start_date'=>'2017-09-17', 'end_date'=>'2017-09-17'],
      ];


        DB::table('events')->insert($data);

    }
}
