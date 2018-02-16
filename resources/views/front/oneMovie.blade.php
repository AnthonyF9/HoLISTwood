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
            <p class="detail-entitled">Year :</p>
            <p class="detail-containt">{{ ucfirst($movie[0]->year) }}</p>
          </li>
          <li>
            <p class="detail-entitled">Director :</p>
            <p class="detail-containt">{{ ucfirst($movie[0]->director) }}</p>
          </li>
          <li>
            <p class="detail-entitled">Writers :</p>
            <p class="detail-containt">{{ ucfirst($movie[0]->writers) }}</p>
          </li>
          <li>
            <p class="detail-entitled">Actors :</p>
            <p class="detail-containt">{{ ucfirst($movie[0]->actors) }}</p>
          </li>
          <li>
            <p class="detail-entitled">Production :</p>
            <p class="detail-containt">{{ ucfirst($movie[0]->production) }}</p>
          </li>
          <li>
            <p class="detail-entitled">Genre :</p>
            <p class="detail-containt">{{ ucfirst($movie[0]->genre) }}</p>
          </li>
          <li>
            <p class="detail-entitled">Runtime :</p>
            <p class="detail-containt">{{ ucfirst($movie[0]->runtime) }}</p>
          </li>
          <li>
            <p class="detail-entitled">Awards :</p>
            <p class="detail-containt">{{ ucfirst($movie[0]->awards) }}</p>
          </li>
      </ul>
    </div>
  </div>

  {{-- <div class="rate">
    <h3>Rate :</h3>
  </div> --}}

  <div class="plot">
    <p>{{ ucfirst($movie[0]->plot) }}</p>
  </div>

  <div id="trailer">
    <div class="rwd-trailer">
      <iframe width = "917px" height="490px" src="https://www.youtube.com/embed/a8v__0kHzNg" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
    </div>
  </div>

  <div class="comment">
    <h3>Comments</h3>
    <div class="comment-list">
      <p></p>
    </div>
  </div>



@endsection
