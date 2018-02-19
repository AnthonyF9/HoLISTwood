@extends('front/submitmovie/layoutsubmitmovie')

@section('activesubmitmoviebyitems')
active @endsection


@section('content-beta')

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


      {!! Form::submit("Ajouter", ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
  @endif


@endsection
