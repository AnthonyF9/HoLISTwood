@extends('layouts/backlayout')

@section('title')
  Edit one movie - HOLISTWOOD
@endsection

@section('activemoderatemovieslist','active')

@section('content-alpha')
  <div class="part">
    <h1>Edit a movie</h1>
  </div>
@endsection

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

@section('content-beta')
  <div class="part">
    <h2> Edit <b>{{ $movie->title }}</b> by <i>{{ $movie->director }}</i> </h2>

    {!! Form::open(['route' => ['moderatemovie-action', $id], 'method' => 'put']) !!}
      <p class="formulaire">
        {!! Form::label('title', 'Title : ', ['class' => '']) !!}
        {!! Form::text('title', $movie->title, ['placeholder' => 'Titre', 'class' => '']) !!}
      </p>
        {!! $errors->first('title','<div class="alert-error" role="alert">:message</div>') !!}
      <p class="formulaire">
        {!! Form::label('year', 'Year : ', ['class' => '']) !!}
        {!! Form::text('year', $movie->year, ['placeholder' => 'year', 'class' => '']) !!}
      </p>
        {!! $errors->first('year','<div class="alert-error" role="alert">:message</div>') !!}
      <p class="formulaire">
        {!! Form::label('runtime', 'Runtime : ', ['class' => '']) !!}
        {!! Form::text('runtime', $movie->runtime, ['placeholder' => 'runtime', 'class' => '']) !!}
      </p>
        {!! $errors->first('runtime','<div class="alert-error" role="alert">:message</div>') !!}
      <p class="formulaire">
        {!! Form::label('director', 'Director : ', ['class' => '']) !!}
        {!! Form::text('director', $movie->director, ['placeholder' => 'director', 'class' => '']) !!}
      </p>
        {!! $errors->first('director','<div class="alert-error" role="alert">:message</div>') !!}
      <p class="formulaire">
        {!! Form::label('writers', 'Writer(s) : ', ['class' => '']) !!}
        {!! Form::text('writers', $movie->writers, ['placeholder' => 'writers', 'class' => '']) !!}
      </p>
        {!! $errors->first('writers','<div class="alert-error" role="alert">:message</div>') !!}
      <p class="formulaire">
        {!! Form::label('actors', 'Actors : ', ['class' => '']) !!}
        {!! Form::textarea('actors', $movie->actors, ['placeholder' => 'actors', 'class' => '']) !!}
      </p>
        {!! $errors->first('actors','<div class="alert-error" role="alert">:message</div>') !!}
      <p class="formulaire">
        {!! Form::label('plot', 'Plot : ', ['class' => '']) !!}
        {!! Form::textarea('plot', $movie->plot, ['placeholder' => 'plot', 'class' => '']) !!}
      </p>
        {!! $errors->first('plot','<div class="alert-error" role="alert">:message</div>') !!}
      <p class="formulaire">
        {!! Form::label('awards', 'Awards : ', ['class' => '']) !!}
        {!! Form::textarea('awards', $movie->awards, ['placeholder' => 'awards', 'class' => '']) !!}
      </p>
        {!! $errors->first('awards','<div class="alert-error" role="alert">:message</div>') !!}
      <p class="formulaire">
        {!! Form::label('poster', 'Poster URL : ', ['class' => '']) !!}
        {!! Form::textarea('poster', $movie->poster, ['placeholder' => 'poster', 'class' => '']) !!}
      </p>
        {!! $errors->first('poster','<div class="alert-error" role="alert">:message</div>') !!}
      <p class="formulaire">
        {!! Form::label('imdb_id', 'IMDB ID : ', ['class' => '']) !!}
        {!! Form::text('imdb_id', $movie->imdb_id, ['placeholder' => 'imdb_id', 'class' => '']) !!}
      </p>
        {!! $errors->first('imdb_id','<div class="alert-error" role="alert">:message</div>') !!}
      <p class="formulaire">
        {!! Form::label('production', 'Production : ', ['class' => '']) !!}
        {!! Form::text('production', $movie->production, ['placeholder' => 'production', 'class' => '']) !!}
      </p>
        {!! $errors->first('production','<div class="alert-error" role="alert">:message</div>') !!}
      <p class="formulaire">
        {!! Form::label('website', 'Website : ', ['class' => '']) !!}
        {!! Form::text('website', $movie->website, ['placeholder' => 'website', 'class' => '']) !!}
      </p>
        {!! $errors->first('website','<div class="alert-error" role="alert">:message</div>') !!}
      <p class="formulaire">
        {!! Form::label('genre', 'Genre: ', ['class' => '']) !!}
        {!! Form::text('genre', $movie->genre, ['placeholder' => 'genre', 'class' => '']) !!}
      </p>
        {!! $errors->first('genre','<div class="alert-error" role="alert">:message</div>') !!}
      <p class="formulaire">
        {!! Form::label('status', 'Status : ', ['class' => '']) !!}
        {!! Form::select('status',['out'=>'Out','incoming'=>'Incoming'], $movie->status) !!}
      </p>
        {!! $errors->first('status','<div class="alert-error" role="alert">:message</div>') !!}
      <p class="formulaire">
        {!! Form::label('release_date', 'release_date : ', ['class' => '']) !!}
        {!! Form::date('release_date', $movie->release_date) !!}
      </p>
        {!! $errors->first('release_date','<div class="alert-error" role="alert">:message</div>') !!}
      <p class="formulaire">
        {!! Form::label('moderation', 'Moderation : ', ['class' => '']) !!}
        {!! Form::select('moderation',['ok'=>'Ok','waiting'=>'Waiting']) !!}
      </p>
      <p class="formulaire">
        {!! Form::submit("Edit", ['class' => 'btn btn-primary']) !!}
      </p>
    {!! Form::close() !!}

    <button type="button" name="button" class="btn btn-secondary"><a href="{{ route('moderatemovieslist') }}">Go back</a></button>


  </div>
@endsection
