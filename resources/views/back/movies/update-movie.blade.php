@extends('layouts/backlayout')

@section('title')
  Edit one movie - HOLISTWOOD
@endsection

@section('activemovieslist','active')

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

    {!! Form::open(['route' => ['editmovie-action', $id], 'method' => 'put']) !!}

      {!! Form::label('title', 'Title : ', ['class' => '']) !!}
      {!! Form::text('title', $movie->title, ['placeholder' => 'Titre', 'class' => '']) !!}
      {!! $errors->first('title','<div class="" role="alert">:message</div>') !!}
    </br>
      {!! Form::label('year', 'Year : ', ['class' => '']) !!}
      {!! Form::text('year', $movie->year, ['placeholder' => 'year', 'class' => '']) !!}
      {!! $errors->first('year','<div class="" role="alert">:message</div>') !!}
    </br>
      {!! Form::label('runtime', 'Runtime : ', ['class' => '']) !!}
      {!! Form::text('runtime', $movie->runtime, ['placeholder' => 'runtime', 'class' => '']) !!}
      {!! $errors->first('runtime','<div class="" role="alert">:message</div>') !!}
    </br>
      {!! Form::label('director', 'Director : ', ['class' => '']) !!}
      {!! Form::text('director', $movie->director, ['placeholder' => 'director', 'class' => '']) !!}
      {!! $errors->first('director','<div class="" role="alert">:message</div>') !!}
    </br>
      {!! Form::label('writers', 'Writer(s) : ', ['class' => '']) !!}
      {!! Form::text('writers', $movie->writers, ['placeholder' => 'writers', 'class' => '']) !!}
      {!! $errors->first('writers','<div class="" role="alert">:message</div>') !!}
    </br>
      {!! Form::label('actors', 'Actors : ', ['class' => '']) !!}
      {!! Form::textarea('actors', $movie->actors, ['placeholder' => 'actors', 'class' => '']) !!}
      {!! $errors->first('actors','<div class="" role="alert">:message</div>') !!}
    </br>
      {!! Form::label('plot', 'Plot : ', ['class' => '']) !!}
      {!! Form::textarea('plot', $movie->plot, ['placeholder' => 'plot', 'class' => '']) !!}
      {!! $errors->first('plot','<div class="" role="alert">:message</div>') !!}
    </br>
      {!! Form::label('awards', 'Awards : ', ['class' => '']) !!}
      {!! Form::textarea('awards', $movie->awards, ['placeholder' => 'awards', 'class' => '']) !!}
      {!! $errors->first('awards','<div class="" role="alert">:message</div>') !!}
    </br>
      {!! Form::label('poster', 'Poster URL : ', ['class' => '']) !!}
      {!! Form::textarea('poster', $movie->poster, ['placeholder' => 'poster', 'class' => '']) !!}
      {!! $errors->first('poster','<div class="" role="alert">:message</div>') !!}
    </br>
      {!! Form::label('imdb_id', 'IMDB ID : ', ['class' => '']) !!}
      {!! Form::text('imdb_id', $movie->imdb_id, ['placeholder' => 'imdb_id', 'class' => '']) !!}
      {!! $errors->first('imdb_id','<div class="" role="alert">:message</div>') !!}
    </br>
      {!! Form::label('production', 'Production : ', ['class' => '']) !!}
      {!! Form::text('production', $movie->production, ['placeholder' => 'production', 'class' => '']) !!}
      {!! $errors->first('production','<div class="" role="alert">:message</div>') !!}
    </br>
      {!! Form::label('website', 'Website : ', ['class' => '']) !!}
      {!! Form::text('website', $movie->website, ['placeholder' => 'website', 'class' => '']) !!}
      {!! $errors->first('website','<div class="" role="alert">:message</div>') !!}
    </br>
      {!! Form::label('genre', 'Genre: ', ['class' => '']) !!}
      {!! Form::text('genre', $movie->genre, ['placeholder' => 'genre', 'class' => '']) !!}
      {!! $errors->first('genre','<div class="" role="alert">:message</div>') !!}
    </br>
      {!! Form::label('status', 'Status : ', ['class' => '']) !!}
      {!! Form::select('status',['out'=>'Out','incoming'=>'Incoming']) !!}
      {!! $errors->first('status','<div class="" role="alert">:message</div>') !!}

      {!! Form::submit("Edit", ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}

  </div>
@endsection
