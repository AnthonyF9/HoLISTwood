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
      {!! Form::label('title', 'Title', ['class' => '']) !!}
      {!! Form::text('title', '', ['class' => '']) !!}
      {!! $errors->first('title','<div class="" role="alert">:message</div>') !!}
    </br>
      {!! Form::label('year', 'Year', ['class' => '']) !!}
      {!! Form::text('year', '', ['class' => '']) !!}
      {!! $errors->first('year','<div class="" role="alert">:message</div>') !!}


      {!! Form::submit("Submit", ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
  @endif


@endsection
