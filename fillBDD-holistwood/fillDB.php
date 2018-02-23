<?php
include_once('./pdo.php');
include_once('./fonctions.php');

$sql = "SELECT * FROM movies";
$query = $pdo->prepare($sql);
$query->execute();
$moviesBDD = $query->fetchAll();


  $str = '0000000111111122222223333333444444455555556666666777777788888889999999';
  $table_imdb = [];
  for ($i=0; $i < 10; $i++) {
    $shuffle = str_shuffle($str);
    $short_shuffle = substr($shuffle,1,6);
    $imdb_new = 'tt0'.$short_shuffle;
    if (array_search($imdb_new,$table_imdb) == FALSE) {
      $table_imdb[] = $imdb_new;
    }
  }
  // debug($table_imdb);
    // $apikey_gui = 67f441ca;
    // $apikey_antho = 224b73f2;
    // $apikey_antho2 = 1f275ea3;
  $table_movies = [];
  foreach ($table_imdb as $key => $oneIMDB) {
    $urlmovie = 'http://www.omdbapi.com/?i='. $oneIMDB . '&apikey=1f275ea3&plot=full';
    $opts = array(
        'http' => array(
            'method' => "GET"
        )
    );
    $context = stream_context_create($opts);
    $raw = file_get_contents($urlmovie, true, $context);
    $movie = json_decode($raw, true);
    $table_movies[] = $movie;
  }
  // debug($table_movies);
    //conditions
  foreach ($table_movies as $key => $movie) {
    if (!empty($movie['Poster']) && $movie['Poster'] !='N/A' && !empty($movie['Awards']) && $movie['Awards'] !='N/A' && !empty($movie['Plot']) && $movie['Plot'] !='N/A' && !empty($movie['Actors']) && $movie['Actors'] !='N/A' && !empty($movie['Director']) && $movie['Director'] !='N/A' && !empty($movie['Production']) && $movie['Production'] !='N/A' && !empty($movie['Writers']) && $movie['Writers'] !='N/A') {
      $title = $movie['Title'];
      echo $title;
      $serie = strstr($title,'Episode');
      if ($serie == FALSE) {
        if (isset($movie['Year']) && !empty($movie['Year'])) { $year = $movie['Year']; } else { $year = 'N/A'; }
        if (isset($movie['Runtime']) && !empty($movie['Runtime'])) { $runtime = $movie['Runtime']; } else { $runtime = 'N/A'; }
        if (isset($movie['Director']) && !empty($movie['Director'])) { $director = $movie['Director']; } else { $director = 'N/A'; }
        if (isset($movie['Writer']) && !empty($movie['Writer'])) { $writers = $movie['Writer']; } else { $writers = 'N/A'; }
        if (isset($movie['Actors']) && !empty($movie['Actors'])) { $actors = $movie['Actors']; } else { $actors = 'N/A'; }
        if (isset($movie['Plot']) && !empty($movie['Plot'])) { $plot = $movie['Plot']; } else { $plot = 'N/A'; }
        if (isset($movie['Awards']) && !empty($movie['Awards'])) { $awards = $movie['Awards']; } else { $awards = 'N/A'; }
        if (isset($movie['Poster']) && !empty($movie['Poster'])) { $poster = $movie['Poster']; } else { $poster = 'N/A'; }
        if (isset($movie['imdbID']) && !empty($movie['imdbID'])) { $imdb_id = $movie['imdbID']; } else { $imdb_id = 'N/A'; }
        if (isset($movie['Production']) && !empty($movie['Production'])) { $production = $movie['Production']; } else { $production = 'N/A'; }
        if (isset($movie['Website']) && !empty($movie['Website'])) { $website = $movie['Website']; } else { $website = 'N/A'; }
        if (isset($movie['Genre']) && !empty($movie['Genre'])) { $genre = $movie['Genre']; } else { $genre = 'N/A'; }
        // echo $title;

        //vérif que le film n'est pas déjà dans la BDD
        $exist = [];
        $exist[0] = 0;
        // debug($exist);
        foreach ($moviesBDD as $key => $value) {
          if ($value['imdb_id'] == $imdb_id) {
            $exist[0] += 1;
          }
        }
        // debug($exist);
        if ($exist[0] == 0) {
          $date = date("Y-m-d H:i:s");
          $sql = "INSERT INTO movies(title,year,runtime,director,writers,actors,plot,awards,poster,imdb_id,production,website,genre,status,created_at,updated_at) VALUES ('$title','$year','$runtime','$director','$writers','$actors','$plot','$awards','$poster','$imdb_id','$production','$website','$genre','out','$date','$date')";
          $query = $pdo->prepare($sql);
          $query->execute();
          br();
          echo 'réussi';
        }
        else {
          br();
          echo 'raté';
        }
      }
      else {
        echo 'C\'est une série';
      }
    }
    else {
      echo 'il n\'y a rien qui corresponde aux critères <br/>';
    }
  }
