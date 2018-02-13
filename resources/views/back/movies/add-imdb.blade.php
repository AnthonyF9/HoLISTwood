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
    {!! Form::open(['route' => 'findmovie', 'method' => 'post'/*, 'onsubmit' => 'return false', 'id' => 'search-by-id-form'*/]) !!}
      {!! Form::label('imdb', 'Imdb d\'un film : ', ['class' => '']) !!}
      {!! Form::text('imdb', null, ['placeholder' => 'L\'imdb du film', 'id' => 'imdb']) !!}
      {!! $errors->first('imdb','<div class="" role="alert">:message</div>') !!}
      {!! Form::submit("Chercher", ['id' => '']) !!}
    {!! Form::close() !!}
  </div>

  @if (session('status'))
      <div class="alert alert-success">
          {{ session('status') }}
      </div>
  @endif
  
@endsection
