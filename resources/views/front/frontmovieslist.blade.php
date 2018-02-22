@extends('layouts/frontlayout')

@section('title')
  Movies List - HOLISTWOOD
@endsection

@section('activemovieslist')
active @endsection

@section('content')

@section('bandeau')
    <div class="bandeau bandeau-movieslist">
      <h2> &mdash; list of movies &mdash; </h2>
      </div>
@endsection


{{ $movies->links() }}

<div class="affiches affichesfront">

  @foreach ($movies as $movie)
  <div class="grid">
    @if (Auth::user())
      <a href="{{ route('oneMovieAuth', array( 'imdb_id'=> $movie->imdb_id )) }}">
    @else
      <a href="{{ route('oneMovie', array( 'imdb_id'=> $movie->imdb_id )) }}">
    @endif
    <figure data-aos="fade-up" class="effect-zoe">
      <img src="{{$movie->poster}}" alt="{{$movie->title}}"/>
      <figcaption>
        <h2>{{$movie->title}}</h2>
      </figcaption>
    </figure>
    </a>
  </div>
   @endforeach


</div>



@endsection
