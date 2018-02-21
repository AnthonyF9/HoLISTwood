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
          <li>
            <p class="detail-entitled">Rating:</p>
            <p class="detail-containt">
              @if (!empty($moyrating))
                {{ $moyrating }} / 5
              @else
                No rating available
              @endif
            </p>
          </li>
      </ul>
    </div><!-- .detail -->
    <div id="list-and-rating">
      @if ( Auth::user() )
        @php
          $imdb_id = $movie[0]->imdb_id;
          $user_id = Auth::user()->id;

          $movie = DB::table('movies')->where('imdb_id','=',$imdb_id)->get();
          $movie_id = $movie[0]->id;
          $itemlist = \DB::table('mylist')
                      ->where([['movie_id','=',$movie_id],['user_id','=',$user_id]])
                      ->get();
          // dd($itemlist[0]);
          // echo $itemlist[0]->id;
        @endphp
        @if (isset($liststatus[0]))
          <div class="add-to-list">
            {!! Form::open(['route' => ['updateinmylist',$imdb_id], 'method' => 'put']) !!}
              {!! Form::select('addtolist',['completed'=>'Watched','dropped'=>'Dropped','plan to watch'=>'Plan to watch'],$liststatus[0]->statuslist) !!}
              {!! Form::submit("Confirm", ['class' => '']) !!}
            {!! Form::close() !!}
          </div><!-- .addd-to-list -->
        @elseif (!empty($itemlist[0]))
          <div class="add-to-list">
            {!! Form::open(['route' => ['updateinmylist',$imdb_id], 'method' => 'put']) !!}
              {!! Form::select('addtolist',['completed'=>'Watched','dropped'=>'Dropped','plan to watch'=>'Plan to watch'],$itemlist[0]->statuslist) !!}
              {!! Form::submit("Confirm", ['class' => '']) !!}
            {!! Form::close() !!}
          </div><!-- .addd-to-list -->
        @else
          <div class="add-to-list">
            {!! Form::open(['route' => ['addtomylist',$imdb_id], 'method' => 'post']) !!}
              {!! Form::select('addtolist', ['completed'=>'Watched','dropped'=>'Dropped','plan to watch'=>'Plan to watch', 'plan to watch'=>'Add to my list'], 'plan to watch') !!}
              {!! Form::submit("Confirm", ['class' => '']) !!}
            {!! Form::close() !!}
          </div><!-- .addd-to-list -->
        @endif
      @else
        <div class="add-to-list">
          <button type="button" name="button">You must log in to add this movie in your list.</button>
        </div><!-- .addd-to-list -->
      @endif
      @if ( Auth::user() )
        <div class="rating-zone">
          
        </div>
      @else
        <div class="rating-zone">
          <button type="button" name="button">You must log in to rate this movie.</button>
        </div>
      @endif
    </div><!-- #list-and-rating -->
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
