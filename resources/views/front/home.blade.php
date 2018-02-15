@extends('layouts/frontlayout')

@section('title')
  Home - HOLISTWOOD
@endsection

@section('activehome')
active @endsection

@section('content')
  <div id="trailer">
    <div class="rwd-trailer">
      <iframe width = "917px" height="490px" src="https://www.youtube.com/embed/6ZfuNTqbHE8" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
    </div>
  </div>


  <div class="affiches">
    @foreach ($movies as $movie)
    <a href="{{ route('oneMovie', array( 'imdb_id'=> $movie->imdb_id )) }}">
      <article class="affiche">
        <img src="{{$movie->poster}}" alt="">
        <div class="titre">
          {{$movie->title}}
        </div>
      </article>
    </a>
     @endforeach

  </div>


@endsection
