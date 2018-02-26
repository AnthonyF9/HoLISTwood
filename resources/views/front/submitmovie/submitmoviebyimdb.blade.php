@extends('front/submitmovie/layoutsubmitmovie')

@section('activesubmitmoviebyimdb')
active @endsection


@section('content-beta')

  @if (session('status'))
    <div id="submitmovie-content">
      <div class="alert alert-success">
          {{ session('status') }}
      </div>
    </div>
  @elseif (session('error'))
    <div id="submitmovie-content">
      <div class="alert alert-danger">
          {{ session('error') }}
      </div>
    </div>
  @else
    <div id="submitmovie-content">
      @if (Auth::user()->role != "banned")
        <div id="submitflex">
          <div class="imdb-link"><p>Your favorite movie isn't on Holistwood ?</p><a href="http://www.imdb.com/?ref_=nv_home" target="_blank">Go to www.imdb.com</a><p>Then copy and paste the IMDB ID of the movie you want to submit !</p></div>
          <img id="imdbexplanation" src="{{asset('img/imdb.png')}}" alt="Imdb explanations">
        </div>
        {!! Form::open(['route' => 'findmoviebyimdb', 'method' => 'post']) !!}
          {!! Form::label('imdb', 'Imdb', ['class' => '']) !!}
          {!! Form::text('imdb', '', array('placeholder'=>'ex: tt4881806'), ['class' => '']) !!}
          {!! $errors->first('imdb','<div class="alert-error" role="alert">:message</div>') !!}

          {!! Form::submit("Submit", ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
      @else
        <div class="banned-error">
          <div class="alert-error" role="alert">You are banned. You can't submit movies.</div>
        </div>
      @endif
    </div>
  @endif


@endsection
