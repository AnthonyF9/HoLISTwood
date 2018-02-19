@extends('front/submitmovie/layoutsubmitmovie')

@section('activesubmitmoviebyimdb')
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
    {!! Form::open(['route' => 'findmoviebyimdb', 'method' => 'post']) !!}
      {!! Form::label('imdb', 'Imdb : ', ['class' => '']) !!}
      {!! Form::text('imdb', '', ['placeholder' => 'Title', 'class' => '']) !!}
      {!! $errors->first('imdb','<div class="" role="alert">:message</div>') !!}

      {!! Form::submit("Ajouter", ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
  @endif


@endsection
