@extends('layouts/backlayout')

@section('title')
  Chercher un IMDB - HOLISTWOOD
@endsection

@section('activeaddimdb','active')

@section('content-alpha')
  <div class="part">
    <h1>Chercher un IMDB</h1>
  </div>
@endsection

@section('content-beta')
  <div class="part">
    {!! Form::open(['route' => 'findmovie', 'method' => 'post']) !!}
      {!! Form::label('imbdb', 'Imdb d\'un film : ', ['class' => '']) !!}
      {!! Form::text('imbdb', null, ['placeholder' => 'L\'imdb du film', 'class' => '']) !!}
      {!! $errors->first('imbdb','<div class="" role="alert">:message</div>') !!}
      {!! Form::submit("Chercher", ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
  </div>
@endsection
