@extends('layouts/frontlayout')

@section('title')
  {{$movie[0]->title}} - {{$movie[0]->year}} - HOLISTWOOD
@endsection

@section('bandeau')
  <div class="bandeau">
    <h2> &mdash; {{ $movie[0]->title }} &mdash; </h2>
    </div>
 @endsection

@section('content')
  <div class="title">
  </div>

  <div class="detail-part">
    <div class="detail-poster">
      <img src="{{ $movie[0]->poster }}" alt="Poster de {{ $movie[0]->title }}">
    </div>
    <div class="detail">
      <ul>
          <li>
            <p class="detail-entitled">Year:</p>
            <p class="detail-containt">{{ ucfirst($movie[0]->year) }}</p>
          </li>
          <li>
            <p class="detail-entitled">Director:</p>
            <p class="detail-containt">{{ ucfirst($movie[0]->director) }}</p>
          </li>
          <li>
            <p class="detail-entitled">Writers:</p>
            <p class="detail-containt">{{ ucfirst($movie[0]->writers) }}</p>
          </li>
          <li>
            <p class="detail-entitled">Actors:</p>
            <p class="detail-containt">{{ ucfirst($movie[0]->actors) }}</p>
          </li>
          <li>
            <p class="detail-entitled">Production:</p>
            <p class="detail-containt">{{ ucfirst($movie[0]->production) }}</p>
          </li>
          <li>
            <p class="detail-entitled">Genre:</p>
            <p class="detail-containt">{{ ucfirst($movie[0]->genre) }}</p>
          </li>
          <li>
            <p class="detail-entitled">Runtime:</p>
            <p class="detail-containt">{{ ucfirst($movie[0]->runtime) }}</p>
          </li>
          <li>
            <p class="detail-entitled">Awards:</p>
            <p class="detail-containt">{{ ucfirst($movie[0]->awards) }}</p>
          </li>
      </ul>
    </div><!-- .detail -->
    @if ( Auth::user() )
      @php
        $imdb_id = $movie[0]->imdb_id;
        $user_id = Auth::user()->id;
      @endphp
      @if (isset($liststatus[0]))
        L'user a add le film
        <div class="add-to-list">
          {!! Form::open(['route' => ['updateinmylist',$imdb_id], 'method' => 'put']) !!}
            {!! Form::select('addtolist',['completed'=>'Watched','dropped'=>'Dropped','plan to watch'=>'Plan to watch'],$liststatus[0]->statuslist) !!}
            {!! Form::submit("Add", ['class' => '']) !!}
          {!! Form::close() !!}
        </div><!-- .addd-to-list -->
      @else
        L'user n'a pas add le film
        <div class="add-to-list">
          {!! Form::open(['route' => ['addtomylist',$imdb_id], 'method' => 'post']) !!}
            {!! Form::select('addtolist', ['completed'=>'Watched','dropped'=>'Dropped','plan to watch'=>'Plan to watch', 'plan to watch'=>'Add to my list'], 'plan to watch') !!}
            {!! Form::submit("Add", ['class' => '']) !!}
          {!! Form::close() !!}
        </div><!-- .addd-to-list -->
      @endif
    @endif
  </div><!-- .detail-part -->

  {{-- <div class="rate">
    <h3>Rate :</h3>
  </div> --}}

  <div class="plot">
    <h3>Plot</h3>
    <p>{{ ucfirst($movie[0]->plot) }}</p>
  </div>

@if (!empty($trailers[0]->url_trailer))
  <div id="trailer">
    <div class="rwd-trailer">
      <iframe width = "917px" height="490px" src="{{$trailers[0]->url_trailer}}" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
    </div>
  </div>
@else

@endif


  <div class="comment">
    <h3>Comments</h3>
    <div class="comment-list">
      <p></p>
    </div>
  </div>



@endsection
