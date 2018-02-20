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

@php

$count = count($trailers) - 1;
$randomid = rand(0, $count);
// $randomid

@endphp



  <div id="trailer">
    <div class="bandeau-trailer">
      <h2> Random trailer </h2>
    </div>
      <div class="rwd-trailer">
        <iframe width = "917px" height="490px" src="{{$trailers[$randomid]->url_trailer}}" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
      </div>
  </div>

  <div class="bandeau2">
    <h2> random movies </h2>
  </div>


  <div class="affiches">


    @foreach ($movies as $movie)
      @if (!empty($movie->poster))

    <div class="grid">
      <a href="{{ route('oneMovie', array( 'imdb_id'=> $movie->imdb_id )) }}">
    	<figure data-aos="fade-up" class="effect-zoe">
    		<img src="{{$movie->poster}}" alt="{{$movie->title}}"/>
    		<figcaption>
    			<h2>{{$movie->title}}</h2>
    		</figcaption>
    	</figure>
      </a>
    </div>
      @endif
     @endforeach


  </div>


@endsection
