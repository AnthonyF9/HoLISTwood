@extends('layouts/frontlayout')

@section('title')
  Accueil - HOLISTWOOD
@endsection

@section('activehome')
active @endsection

@section('content')
  <div id="trailer">
    <div class="rwd-trailer">
      <iframe width = "917px" height="490px" src="https://www.youtube.com/embed/a8v__0kHzNg" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
    </div>
  </div>


  <div class="affiches">
    @foreach ($movies as $movie)
    <article class="affiche">

    <img src="{{$movie->poster}}" alt=""> </article>
     @endforeach

  </div>



  @foreach ($movies as $movie)
  {{$movie->title}}
  @endforeach

@endsection
