@extends('layouts/backlayout')

@section('title')
  Add Trailers - HOLISTWOOD
@endsection

@section('activemovieslist','active')

@section('content-alpha')
  <div class="part">
    <h1>Add Trailers</h1>
  </div>
@endsection


@section('content-beta')
  <div class="part">
    <h2> Add trailer for <b>{{ $trailersToOneMovie[0]->title }}</b> by <i>{{ $trailersToOneMovie[0]->director }}</i> </h2>
    <br/>
    <small>To add a tralier, you have to go on Youtube, click on "share", then "integer" and copy the src url in the iframe code.</small>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    @if (session('status-error'))
        <div class="alert alert-error">
            {{ session('status-error') }}
        </div>
    @endif

    {!! Form::open(['route' => ['addtraileraction', $id], 'method' => 'post']) !!}

      {!! Form::label('trailer', 'Trailer : ', ['class' => '']) !!}
      {!! Form::text('trailer', null, ['placeholder' => 'Trailer url with "embed" in the url', 'class' => 'trailer']) !!}
      {!! $errors->first('trailer','<div class="" role="alert">:message</div>') !!}
    </br>

      {!! Form::submit("Add trailer", ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}

  </div>
@endsection
