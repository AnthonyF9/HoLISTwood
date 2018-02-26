@extends('layouts/frontlayout')

@section('title')
  Votre profil - HOLISTWOOD
@endsection

@section('activeprofile')
active @endsection

@section('content')
  <div class="profile-head">
    <img src="{{ asset('/img/star.png') }}" alt="beautiful star">
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
    <table>
      <tr>
        <th>Title</th>
        <th>Status</th>
        <th>My rate</th>
      </tr>
      {{-- {{ dd($mymovieslist) }} --}}
      @foreach ($mymovieslist as $movie)
        <tr>
          <td><a href="{{ route('oneMovieAuth', array( 'imdb_id'=> $movie->imdb_id )) }}">{{$movie->title}}</a></td>
          <td>{{$movie->statuslist}}</td>
          <td>{{$movie->note}}</td>
        </tr>
      @endforeach
    </table>
  </div>
@endsection
