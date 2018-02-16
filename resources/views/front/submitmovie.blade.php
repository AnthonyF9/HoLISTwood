@extends('layouts/frontlayout')

@section('title')
  Submit a movie - HOLISTWOOD
@endsection

@section('activesubmitmovie')
active @endsection



@section('content')

  @if (session('status'))
      <div class="alert alert-success">
          {{ session('status') }}
      </div>
  @elseif (session('error'))
      <div class="alert alert-danger">
          {{ session('error') }}
      </div>
  @else
    {!! Form::open(['route' => 'submitmovie-action', 'method' => 'post']) !!}
      {!! Form::label('title', 'Titre : ', ['class' => '']) !!}
      {!! Form::text('title', '', ['placeholder' => 'Title', 'class' => '']) !!}
      {!! $errors->first('title','<div class="" role="alert">:message</div>') !!}
    </br>
      {!! Form::label('year', 'Année : ', ['class' => '']) !!}
      {!! Form::text('year', '', ['placeholder' => 'year', 'class' => '']) !!}
      {!! $errors->first('year','<div class="" role="alert">:message</div>') !!}
    </br>
      {!! Form::label('runtime', 'Durée : ', ['class' => '']) !!}
      {!! Form::text('runtime', '', ['placeholder' => 'runtime', 'class' => '']) !!}
      {!! $errors->first('runtime','<div class="" role="alert">:message</div>') !!}
    </br>
      {!! Form::label('director', 'Réalisateur : ', ['class' => '']) !!}
      {!! Form::text('director', '', ['placeholder' => 'director', 'class' => '']) !!}
      {!! $errors->first('director','<div class="" role="alert">:message</div>') !!}
    </br>
      {!! Form::label('writers', 'Auteurs : ', ['class' => '']) !!}
      {!! Form::text('writers', '', ['placeholder' => 'writers', 'class' => '']) !!}
      {!! $errors->first('writers','<div class="" role="alert">:message</div>') !!}
    </br>
      {!! Form::label('actors', 'Acteurs : ', ['class' => '']) !!}
      {!! Form::textarea('actors', '', ['placeholder' => 'actors', 'class' => '']) !!}
      {!! $errors->first('actors','<div class="" role="alert">:message</div>') !!}
    </br>
      {!! Form::label('plot', 'Synopsis : ', ['class' => '']) !!}
      {!! Form::textarea('plot', '', ['placeholder' => 'plot', 'class' => '']) !!}
      {!! $errors->first('plot','<div class="" role="alert">:message</div>') !!}
    </br>
      {!! Form::label('awards', 'Récompenses : ', ['class' => '']) !!}
      {!! Form::textarea('awards', '', ['placeholder' => 'awards', 'class' => '']) !!}
      {!! $errors->first('awards','<div class="" role="alert">:message</div>') !!}
    </br>
      {!! Form::label('poster', 'URL du poster : ', ['class' => '']) !!}
      {!! Form::textarea('poster', '', ['placeholder' => 'poster', 'class' => '']) !!}
      {!! $errors->first('poster','<div class="" role="alert">:message</div>') !!}
    </br>
      {!! Form::label('imdb_id', 'ID IMDB : ', ['class' => '']) !!}
      {!! Form::text('imdb_id', '', ['placeholder' => 'imdb_id', 'class' => '']) !!}
      {!! $errors->first('imdb_id','<div class="" role="alert">:message</div>') !!}
    </br>
      {!! Form::label('production', 'Production : ', ['class' => '']) !!}
      {!! Form::text('production', '', ['placeholder' => 'production', 'class' => '']) !!}
      {!! $errors->first('production','<div class="" role="alert">:message</div>') !!}
    </br>
      {!! Form::label('website', 'Site web : ', ['class' => '']) !!}
      {!! Form::text('website', '', ['placeholder' => 'website', 'class' => '']) !!}
      {!! $errors->first('website','<div class="" role="alert">:message</div>') !!}
    </br>
      {!! Form::label('genre', 'Genre: ', ['class' => '']) !!}
      {!! Form::text('genre', '', ['placeholder' => 'genre', 'class' => '']) !!}
      {!! $errors->first('genre','<div class="" role="alert">:message</div>') !!}
    </br>
      {!! Form::label('status', 'Status : ', ['class' => '']) !!}
      {!! Form::select('status',['out'=>'Out','incoming'=>'Incoming']) !!}
      {!! $errors->first('status','<div class="" role="alert">:message</div>') !!}
    </br>
      {!! Form::label('release_date', 'release_date : ', ['class' => '']) !!}
      {!! Form::date('release_date', \Carbon\Carbon::now()) !!}
      {!! $errors->first('release_date','<div class="" role="alert">:message</div>') !!}

      {!! Form::submit("Ajouter", ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
  @endif


@endsection
