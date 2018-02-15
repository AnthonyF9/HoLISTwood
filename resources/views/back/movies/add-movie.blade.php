@extends('layouts/backlayout')

@section('title')
  Add a movie - HOLISTWOOD
@endsection

@section('activeaddimdb','active')

@section('content-alpha')
  <div class="part">
    <h1>Add a movie</h1>
  </div>
@endsection

@php
$opts = array(
  'http' => array(
      'method' => "GET"
  )
);

$context = stream_context_create($opts);
$raw = file_get_contents($urlmovie, true, $context);
$movie = json_decode($raw, true);
// echo '<pre>';
// print_r($movie);
// echo '</pre>';
@endphp



@section('content-beta')
  <div class="part">
    @if (isset($movie['Title']) && !empty($movie['Title']) && $movie['Title'] !='N/A' && isset($movie['Plot']) && !empty($movie['Plot']) && $movie['Plot'] !='N/A')
      @php
        $title = $movie['Title'];
        // echo $title;
        $serie = strstr($title,'Episode');
      @endphp
      @if ($serie != FALSE)
        <p>Ceci est une série, non un movie.</p>
      @else
        @php
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
        @endphp

        {!! Form::open(['route' => 'addmovie', 'method' => 'post']) !!}
          {!! Form::label('title', 'Titre : ', ['class' => '']) !!}
          {!! Form::text('title', $title, ['placeholder' => 'Titre', 'class' => '']) !!}
          {!! $errors->first('title','<div class="" role="alert">:message</div>') !!}
        </br>
          {!! Form::label('year', 'Année : ', ['class' => '']) !!}
          {!! Form::text('year', $year, ['placeholder' => 'year', 'class' => '']) !!}
          {!! $errors->first('year','<div class="" role="alert">:message</div>') !!}
        </br>
          {!! Form::label('runtime', 'Durée : ', ['class' => '']) !!}
          {!! Form::text('runtime', $runtime, ['placeholder' => 'runtime', 'class' => '']) !!}
          {!! $errors->first('runtime','<div class="" role="alert">:message</div>') !!}
        </br>
          {!! Form::label('director', 'Réalisateur : ', ['class' => '']) !!}
          {!! Form::text('director', $director, ['placeholder' => 'director', 'class' => '']) !!}
          {!! $errors->first('director','<div class="" role="alert">:message</div>') !!}
        </br>
          {!! Form::label('writers', 'Auteurs : ', ['class' => '']) !!}
          {!! Form::text('writers', $writers, ['placeholder' => 'writers', 'class' => '']) !!}
          {!! $errors->first('writers','<div class="" role="alert">:message</div>') !!}
        </br>
          {!! Form::label('actors', 'Acteurs : ', ['class' => '']) !!}
          {!! Form::textarea('actors', $actors, ['placeholder' => 'actors', 'class' => '']) !!}
          {!! $errors->first('actors','<div class="" role="alert">:message</div>') !!}
        </br>
          {!! Form::label('plot', 'Synopsis : ', ['class' => '']) !!}
          {!! Form::textarea('plot', $plot, ['placeholder' => 'plot', 'class' => '']) !!}
          {!! $errors->first('plot','<div class="" role="alert">:message</div>') !!}
        </br>
          {!! Form::label('awards', 'Récompenses : ', ['class' => '']) !!}
          {!! Form::textarea('awards', $awards, ['placeholder' => 'awards', 'class' => '']) !!}
          {!! $errors->first('awards','<div class="" role="alert">:message</div>') !!}
        </br>
          {!! Form::label('poster', 'URL du poster : ', ['class' => '']) !!}
          {!! Form::textarea('poster', $poster, ['placeholder' => 'poster', 'class' => '']) !!}
          {!! $errors->first('poster','<div class="" role="alert">:message</div>') !!}
        </br>
          {!! Form::label('imdb_id', 'ID IMDB : ', ['class' => '']) !!}
          {!! Form::text('imdb_id', $imdb_id, ['placeholder' => 'imdb_id', 'class' => '']) !!}
          {!! $errors->first('imdb_id','<div class="" role="alert">:message</div>') !!}
        </br>
          {!! Form::label('production', 'Production : ', ['class' => '']) !!}
          {!! Form::text('production', $production, ['placeholder' => 'production', 'class' => '']) !!}
          {!! $errors->first('production','<div class="" role="alert">:message</div>') !!}
        </br>
          {!! Form::label('website', 'Site web : ', ['class' => '']) !!}
          {!! Form::text('website', $website, ['placeholder' => 'website', 'class' => '']) !!}
          {!! $errors->first('website','<div class="" role="alert">:message</div>') !!}
        </br>
          {!! Form::label('genre', 'Genre: ', ['class' => '']) !!}
          {!! Form::text('genre', $genre, ['placeholder' => 'genre', 'class' => '']) !!}
          {!! $errors->first('genre','<div class="" role="alert">:message</div>') !!}
        </br>
          {!! Form::label('status', 'Status : ', ['class' => '']) !!}
          {!! Form::select('status',['out'=>'Out','incoming'=>'Incoming']) !!}
          {!! $errors->first('status','<div class="" role="alert">:message</div>') !!}

          {!! Form::submit("Ajouter", ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}


      @endif
    @else
      <p>Ce movie n'existe pas.</p>
      <p><a href="{{ route('addimdb') }}">Retour</a></p>
    @endif
  </div>
@endsection
