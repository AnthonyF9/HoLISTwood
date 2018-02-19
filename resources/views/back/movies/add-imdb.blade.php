@extends('layouts/backlayout')

@section('title')
  Find an IMDB - HOLISTWOOD
@endsection

@section('activeaddimdb','active')

@section('content-alpha')
  <div class="part">
    <h1>Find an IMDB</h1>
  </div>
@endsection

@section('content-beta')
  <div class="part partimdb">
    {!! Form::open(['route' => 'findmovie', 'method' => 'post']) !!}
      {!! Form::label('imdb', 'Movie IMDB : ', ['class' => '']) !!}
      {!! Form::text('imdb', null, ['placeholder' => 'Put your IMDB here', 'id' => 'imdb']) !!}
      {!! $errors->first('imdb','<div class="" role="alert">:message</div>') !!}
      {!! Form::submit("Find", ['id' => '', 'class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
  </div>

  @if (session('status'))
      <div class="alert alert-success">
          {{ session('status') }}
      </div>
  @endif

  @if (session('error'))
      <div class="alert alert-danger">
          {{ session('error') }}
      </div>
  @endif

@endsection
