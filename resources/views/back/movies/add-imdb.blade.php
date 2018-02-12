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
