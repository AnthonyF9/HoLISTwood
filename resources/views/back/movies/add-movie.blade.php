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
@endphp



@section('content-beta')
  <div class="part">

    {!! Form::open(['route' => 'addmovie', 'method' => 'post']) !!}

      {!! Form::label('title', 'Title : ', ['class' => '']) !!}
      {!! Form::text('title', $movie['Title'], ['placeholder' => 'Titre', 'class' => '']) !!}
      {!! $errors->first('title','<div class="" role="alert">:message</div>') !!}
    </br>
      {!! Form::label('year', 'Year : ', ['class' => '']) !!}
      {!! Form::text('year', $movie['Year'], ['placeholder' => 'year', 'class' => '']) !!}
      {!! $errors->first('year','<div class="" role="alert">:message</div>') !!}
    </br>
      {!! Form::label('runtime', 'Runtime : ', ['class' => '']) !!}
      {!! Form::text('runtime', $movie['Runtime'], ['placeholder' => 'runtime', 'class' => '']) !!}
      {!! $errors->first('runtime','<div class="" role="alert">:message</div>') !!}
    </br>
      {!! Form::label('director', 'Director : ', ['class' => '']) !!}
      {!! Form::text('director', $movie['Director'], ['placeholder' => 'director', 'class' => '']) !!}
      {!! $errors->first('director','<div class="" role="alert">:message</div>') !!}
    </br>
      {!! Form::label('writers', 'Writer(s) : ', ['class' => '']) !!}
      {!! Form::text('writers', $movie['Writer'], ['placeholder' => 'writers', 'class' => '']) !!}
      {!! $errors->first('writers','<div class="" role="alert">:message</div>') !!}
    </br>
      {!! Form::label('actors', 'Actors : ', ['class' => '']) !!}
      {!! Form::textarea('actors', $movie['Actors'], ['placeholder' => 'actors', 'class' => '']) !!}
      {!! $errors->first('actors','<div class="" role="alert">:message</div>') !!}
    </br>
      {!! Form::label('plot', 'Plot : ', ['class' => '']) !!}
      {!! Form::textarea('plot', $movie['Plot'], ['placeholder' => 'plot', 'class' => '']) !!}
      {!! $errors->first('plot','<div class="" role="alert">:message</div>') !!}
    </br>
      {!! Form::label('awards', 'Awards : ', ['class' => '']) !!}
      {!! Form::textarea('awards', $movie['Awards'], ['placeholder' => 'awards', 'class' => '']) !!}
      {!! $errors->first('awards','<div class="" role="alert">:message</div>') !!}
    </br>
      {!! Form::label('poster', 'Poster URL : ', ['class' => '']) !!}
      {!! Form::textarea('poster', $movie['Poster'], ['placeholder' => 'poster', 'class' => '']) !!}
      {!! $errors->first('poster','<div class="" role="alert">:message</div>') !!}
    </br>
      {!! Form::label('imdb_id', 'IMDB ID : ', ['class' => '']) !!}
      {!! Form::text('imdb_id', $movie['imdbID'], ['placeholder' => 'imdb_id', 'class' => '']) !!}
      {!! $errors->first('imdb_id','<div class="" role="alert">:message</div>') !!}
    </br>
      {!! Form::label('production', 'Production : ', ['class' => '']) !!}
      {!! Form::text('production', $movie['Production'], ['placeholder' => 'production', 'class' => '']) !!}
      {!! $errors->first('production','<div class="" role="alert">:message</div>') !!}
    </br>
      {!! Form::label('website', 'Website : ', ['class' => '']) !!}
      {!! Form::text('website', $movie['Website'], ['placeholder' => 'website', 'class' => '']) !!}
      {!! $errors->first('website','<div class="" role="alert">:message</div>') !!}
    </br>
      {!! Form::label('genre', 'Genre: ', ['class' => '']) !!}
      {!! Form::text('genre', $movie['Genre'], ['placeholder' => 'genre', 'class' => '']) !!}
      {!! $errors->first('genre','<div class="" role="alert">:message</div>') !!}
    </br>
      {!! Form::label('status', 'Status : ', ['class' => '']) !!}
      {!! Form::select('status',['out'=>'Out','incoming'=>'Incoming']) !!}
      {!! $errors->first('status','<div class="" role="alert">:message</div>') !!}

      {!! Form::submit("Ajouter", ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}

@endsection
