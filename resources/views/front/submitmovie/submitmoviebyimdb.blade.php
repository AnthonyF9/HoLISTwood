@extends('front/submitmovie/layoutsubmitmovie')

@section('activesubmitmoviebyimdb')
active @endsection


@section('content-beta')

  @if (session('status'))
    <div id="submitmovie" class="alertbox">
      <div class="alert alert-success">
          {{ session('status') }}
      </div>
    </div>
  @elseif (session('error'))
    <div id="submitmovie" class="alertbox">
      <div class="alert alert-danger">
          {{ session('error') }}
      </div>
    </div>
  @else
    {!! Form::open(['route' => 'findmoviebyimdb', 'method' => 'post']) !!}
      {!! Form::label('imdb', 'Imdb', ['class' => '']) !!}
      {!! Form::text('imdb', '', ['class' => '']) !!}
      {!! $errors->first('imdb','<div class="" role="alert">:message</div>') !!}

      {!! Form::submit("Submit", ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
  @endif


@endsection
