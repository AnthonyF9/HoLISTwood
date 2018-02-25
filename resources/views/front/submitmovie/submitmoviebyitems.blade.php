@extends('front/submitmovie/layoutsubmitmovie')

@section('activesubmitmoviebyitems')
active @endsection


@section('content-beta')

  @if (session('status'))
    <div id="submitmovie-content" class="alertbox">
      <div class="alert alert-success">
          {{ session('status') }}
      </div>
    </div>
  @elseif (session('error'))
    <div id="submitmovie-content" class="alertbox">
      <div class="alert alert-danger">
          {{ session('error') }}
      </div>
    </div>
  @else
    <div id="submitmovie-content">
      @if (Auth::user()->role != "banned")
        {!! Form::open(['route' => 'submitmovie-action', 'method' => 'post']) !!}
          <p class="formulaire">
            {!! Form::label('title', 'Title', ['class' => '']) !!}
            {!! Form::text('title', '', ['class' => '']) !!}
          </p>
            {!! $errors->first('title','<div class="alert-error" role="alert">:message</div>') !!}
          <p class="formulaire">
            {!! Form::label('year', 'Year', ['class' => '']) !!}
            {!! Form::text('year', '', ['class' => '']) !!}
          </p>
            {!! $errors->first('year','<div class="alert-error" role="alert">:message</div>') !!}
          <p class="formulaire">
            {!! Form::submit("Submit", ['class' => 'btn btn-primary']) !!}
          </p>
        {!! Form::close() !!}
      @else
        <div class="banned-error">
          <div class="alert-error" role="alert">You are banned. You can't submit movies.</div>
        </div>
      @endif
    </div>
  @endif


@endsection
