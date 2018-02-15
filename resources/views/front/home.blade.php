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

    {{-- <article data-aos="fade-up" class="affiche"> --}}

    {{-- <img src="{{$movie->poster}}" alt=""> --}}

    <div class="grid">

    	<figure data-aos="fade-up" class="effect-zoe">
    		<img src="{{$movie->poster}}" alt="{{$movie->title}}"/>
    		<figcaption>
    			<h2>{{$movie->title}}</h2>
    			<a href="#">View more</a>
    		</figcaption>
    	</figure>

    	<!-- ... -->

    </div>

      {{-- {{$movie->title}} --}}

    {{-- </article> --}}
     @endforeach

  </div>


@endsection
