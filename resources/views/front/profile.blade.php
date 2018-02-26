@extends('layouts/frontlayout')

@section('title')
  Votre profil - HOLISTWOOD
@endsection

@section('activeprofile')
active @endsection

@section('content')
  <div class="profile-head">
    <img src="{{ asset('img/avatar.svg') }}" alt="avatar">
    <h1>{{ Auth::user()->name }}</h1>
    <div class="profile-button">
    </div>
  </div>

  <nav class="profile-menu">
    <ul>
      <li>Movies in my list</li>
    </ul>
  </nav>

  <div id="movies-list-profile">
    <ul>
      @foreach ($mymovieslist as $movie)
      <li><a href="{{ route('oneMovieAuth', array( 'imdb_id'=> $movie->imdb_id )) }}"><h2>{{$movie->title}}</h2></a></li>
      @endforeach
    </ul>
  </div>
@endsection
