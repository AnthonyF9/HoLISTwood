@extends('layouts/backlayout')

@section('title')
  Ajouter un film - HOLISTWOOD
@endsection

@section('activeaddimdb','active')

@section('content-alpha')
  <div class="part">
    <h1>Ajouter un film</h1>
  </div>
@endsection

@php
$opts = array(
  'http' => array(
      'method' => "GET"
  )
);

$context = stream_context_create($opts);
$url = 'http://www.omdbapi.com/?t=return&y=2003&apikey=224b73f2';

$raw = file_get_contents($url, true, $context);
$movie = json_decode($raw, true);
@endphp



@section('content-beta')
  <div class="part">
    {!! Form::open(['route' => 'addmovie', 'method' => 'post']) !!}

      {!! Form::label('title', 'Titre : ', ['class' => '']) !!}
      {!! Form::text('title', $movie['Title'], ['placeholder' => 'Titre', 'class' => '']) !!}
      {!! $errors->first('title','<div class="" role="alert">:message</div>') !!}
    </br>
      {!! Form::label('year', 'Année : ', ['class' => '']) !!}
      {!! Form::text('year', $movie['Year'], ['placeholder' => 'year', 'class' => '']) !!}
      {!! $errors->first('year','<div class="" role="alert">:message</div>') !!}
    </br>
      {!! Form::label('runtime', 'Durée : ', ['class' => '']) !!}
      {!! Form::text('runtime', $movie['Runtime'], ['placeholder' => 'runtime', 'class' => '']) !!}
      {!! $errors->first('runtime','<div class="" role="alert">:message</div>') !!}
    </br>
      {!! Form::label('director', 'Réalisateur : ', ['class' => '']) !!}
      {!! Form::text('director', $movie['Director'], ['placeholder' => 'director', 'class' => '']) !!}
      {!! $errors->first('director','<div class="" role="alert">:message</div>') !!}
    </br>
      {!! Form::label('writers', 'Auteurs : ', ['class' => '']) !!}
      {!! Form::text('writers', $movie['Writer'], ['placeholder' => 'writers', 'class' => '']) !!}
      {!! $errors->first('writers','<div class="" role="alert">:message</div>') !!}
    </br>
      {!! Form::label('actors', 'Acteurs : ', ['class' => '']) !!}
      {!! Form::text('actors', $movie['Actors'], ['placeholder' => 'actors', 'class' => '']) !!}
      {!! $errors->first('actors','<div class="" role="alert">:message</div>') !!}
    </br>
      {!! Form::label('plot', 'Synopsis : ', ['class' => '']) !!}
      {!! Form::text('plot', $movie['Plot'], ['placeholder' => 'plot', 'class' => '']) !!}
      {!! $errors->first('plot','<div class="" role="alert">:message</div>') !!}
    </br>
      {!! Form::label('awards', 'Récompenses : ', ['class' => '']) !!}
      {!! Form::text('awards', $movie['Awards'], ['placeholder' => 'awards', 'class' => '']) !!}
      {!! $errors->first('awards','<div class="" role="alert">:message</div>') !!}
    </br>
      {!! Form::label('imdb_id', 'IP IMDB : ', ['class' => '']) !!}
      {!! Form::text('imdb_id', $movie['imdbID'], ['placeholder' => 'imdb_id', 'class' => '']) !!}
      {!! $errors->first('imdb_id','<div class="" role="alert">:message</div>') !!}
    </br>
      {!! Form::label('production', 'Production : ', ['class' => '']) !!}
      {!! Form::text('production', $movie['Production'], ['placeholder' => 'production', 'class' => '']) !!}
      {!! $errors->first('production','<div class="" role="alert">:message</div>') !!}
    </br>
      {!! Form::label('website', 'Site web : ', ['class' => '']) !!}
      {!! Form::text('website', $movie['Website'], ['placeholder' => 'website', 'class' => '']) !!}
      {!! $errors->first('website','<div class="" role="alert">:message</div>') !!}
    </br>
      {!! Form::label('genre', 'Genre: ', ['class' => '']) !!}
      {!! Form::text('genre', $movie['Genre'], ['placeholder' => 'genre', 'class' => '']) !!}
      {!! $errors->first('genre','<div class="" role="alert">:message</div>') !!}
    </br>
      {!! Form::label('status', 'Statut : ', ['class' => '']) !!}
      {!! Form::text('status', null, ['placeholder' => 'status', 'class' => '']) !!}
      {!! $errors->first('status','<div class="" role="alert">:message</div>') !!}

      {!! Form::submit("Ajouter", ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
  </div>
@endsection
