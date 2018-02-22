@extends('layouts/frontlayout')

@section('title')
  {{$movie[0]->title}} - {{$movie[0]->year}} - HOLISTWOOD
@endsection

@section('bandeau')
  <div class="bandeau bandeau-single">
    <h2> &mdash; {{ $movie[0]->title }} &mdash; </h2>
    </div>
 @endsection

@section('content')

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
  </div><!-- .detail-part -->

  <div id="list-and-rating">
    @if ( Auth::user() )
      @if (isset($liststatus[0]))
        <div class="add-to-list">
          {!! Form::open(['route' => ['updateinmylist',$imdb_id], 'method' => 'put']) !!}
            {!! Form::select('addtolist',['completed'=>'Watched','dropped'=>'Dropped','plan to watch'=>'Plan to watch'],$liststatus[0]->statuslist) !!}
            {!! Form::submit("Confirm", ['class' => '']) !!}
          {!! Form::close() !!}
        </div><!-- .add-to-list -->
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
      </div><!-- .add-to-list -->
    @endif
    @if ( Auth::user() )
      {{-- {{ dd($ratingstatus[0]) }} --}}
      @if (isset($ratingstatus[0]))
        <div class="rating-zone">
          {!! Form::open(['route' => ['updatemyrating',$imdb_id], 'method' => 'put']) !!}
            {!! Form::select('rating', [0=>'0', 1=>'1', 2=>'2', 3=>'3', 4=>'4', 5=>'5'], $ratingstatus[0]->note) !!}
            {!! Form::submit("Rate", ['class' => '']) !!}
          {!! Form::close() !!}
        </div><!-- .rating-zone -->
      @elseif (!empty($ratinglist[0]))
        <div class="rating-zone">
          {!! Form::open(['route' => ['updatemyrating',$imdb_id], 'method' => 'put']) !!}
            {!! Form::select('rating', [0=>'0', 1=>'1', 2=>'2', 3=>'3', 4=>'4', 5=>'5'], $ratingstatus[0]->note) !!}
            {!! Form::submit("Rate", ['class' => '']) !!}
          {!! Form::close() !!}
        </div><!-- rating-zone -->
      @else
        <div class="rating-zone">
          {!! Form::open(['route' => ['rate',$imdb_id], 'method' => 'post']) !!}
            {!! Form::select('rating', [0=>'0', 1=>'1', 2=>'2', 3=>'3', 4=>'4', 5=>'5'], 'plan to watch') !!}
            {!! Form::submit("Rate", ['class' => '']) !!}
          {!! Form::close() !!}
        </div><!-- rating-zone -->
      @endif
    @else
      <div class="rating-zone">
        <button type="button" name="button">You must log in to rate this movie.</button>
      </div>
    @endif
  </div><!-- #list-and-rating -->

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
    @if (Auth::user())
      {!! Form::open(['route' => ['postcomment',$imdb_id], 'method' => 'post']) !!}
        <textarea name="comment" rows="8" cols="80" placeholder="Let your comment here"></textarea>
        {!! $errors->first('comment','<div class="alert-error" role="alert">:message</div>') !!}
        <br/>
        {!! Form::submit("Comment it", ['class' => '']) !!}
      {!! Form::close() !!}
    @else
      <div class="comment-list">
        <div>You must to be log in to comment.</div>
      </div><!-- .comment-list -->
    @endif
    {{-- {{ dd($allcomments) }} --}}
    @foreach ($allcomments as $key => $onecomment)
      <div class="comment-list">
        <h4><span>{{ $onecomment->name }}</span> the {{ $onecomment->created_at }}</h4>
        <p>{{ $onecomment->content }}</p>
      </div><!-- .comment-list -->
    @endforeach
  </div>



@endsection
