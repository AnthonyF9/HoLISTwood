<?php

use Illuminate\Database\Seeder;

class CategorieTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $categorie =[];
      $date = new DateTime();
      $categorie[] = array (
        'genre' =>'action',
        'created_at' => $date->format('Y-m-d H:i:s')
      );
      DB::table('categorie')->insert($categorie);
    }
}
