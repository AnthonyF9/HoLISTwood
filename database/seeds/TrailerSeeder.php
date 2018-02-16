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
        'id_movie'    =>1,
        'url_trailer' =>'https://www.youtube.com/embed/FcOt6mfjxeA',
      ];

      $trailer[] = [
        'id_movie'    =>2,
        'url_trailer' =>'https://www.youtube.com/embed/g8evyE9TuYk',
      ];

      $trailer[] = [
        'id_movie'    =>3,
        'url_trailer' =>'https://www.youtube.com/embed/r5X-hFf6Bwo',
      ];

      $trailer[] = [
        'id_movie'    =>4,
        'url_trailer' =>'https://www.youtube.com/embed/zSWdZVtXT7E',
      ];

      $trailer[] = [
        'id_movie'    =>5,
        'url_trailer' =>'https://www.youtube.com/embed/YoHD9XEInc0',
      ];

      $trailer[] = [
        'id_movie'    =>6,
        'url_trailer' =>'https://www.youtube.com/embed/ol67qo3WhJk',

      ];

        $trailer[] = [
          'id_movie'    =>7,
          'url_trailer' =>'https://www.youtube.com/embed/RYID71hYHzg',
            ];

        $trailer[] = [
          'id_movie'    =>8,
          'url_trailer' =>'https://www.youtube.com/embed/ArdNQUUcZOM',
      ];

      $trailer[] = [
          'id_movie'    =>9,
          'url_trailer' =>'https://www.youtube.com/embed/fLe_qO4AE-M',
      ];

      $trailer[] = [
          'id_movie'    =>10,
          'url_trailer' =>'https://www.youtube.com/embed/naQr0uTrH_s',
      ];

      $trailer[] = [
          'id_movie'    =>11,
          'url_trailer' =>'https://www.youtube.com/embed/ue80QwXMRHg',
      ];

      $trailer[] = [
          'id_movie'    =>12,
          'url_trailer' =>'https://www.youtube.com/embed/6ZfuNTqbHE8',
      ];

        DB::table('trailer')->insert($trailer);

    }
}
