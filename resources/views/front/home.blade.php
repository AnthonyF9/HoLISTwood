@extends('layouts/frontlayout')

@section('title')
  Home - HOLISTWOOD
@endsection

@section('activehome')
active @endsection

@section('bandeau')
  <div class="bandeau">
    @guest
    <p>&mdash; Welcome to Holistwood,  an active online movie community and database. Join the online community, create your movie list, explore the comments section, follow news, and so much more! &mdash;</p>

    @endguest
    @if ( Auth::user())
      <p>&mdash; Hey {{ Auth::user()->name }} ! How are you today ? :) &mdash;</p>
    @endif
    </div>
 @endsection

@section('content')


  <div id="trailer">
    <div class="bandeau-trailer">
      <h2> trailers </h2>
    </div>

      <div class="rwd-trailer">
        <iframe width = "917px" height="490px" src="{{$trailers[$randomid]->url_trailer}}" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
      </div>

  </div>

  <div class="bandeau2">
    <h2> movies </h2>
  </div>


  <div class="affiches">


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
