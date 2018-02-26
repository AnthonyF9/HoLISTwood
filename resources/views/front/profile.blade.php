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
      {{-- {{ dd($mymoviesrating) }} --}}
      {{-- {{ dd($mymovieslist) }} --}}
      @php
        $ratingmovie = [];
      @endphp
      @foreach ($mymoviesrating as $onemovierating)
        @php
          $ratingmovie[] = $onemovierating->id_movie;
        @endphp
      @endforeach
      {{-- {{ dd($ratingmovie) }} --}}
      @foreach ($mymovieslist as $movie)
        <tr>
          <td><a href="{{ route('oneMovieAuth', array( 'imdb_id'=> $movie->imdb_id )) }}">{{$movie->title}}</a></td>
          <td>{{$movie->statuslist}}</td>
          <td>
            @foreach ($mymoviesrating as $onemovierating)
              @if ($onemovierating->id_user == Auth::user()->id)
                  {{-- {{ in_array($movie->movie_id,$ratingmovie) }} --}}
                @if (in_array($movie->movie_id,$ratingmovie) != 0)
                  @if ($onemovierating->id_movie == $movie->movie_id)
                    @if (!empty($onemovierating->note))
                      {{$onemovierating->note}} / 5
                    @else
                      @php $noraitingavailable = "No rating available"; @endphp
                    @endif
                  @endif
                @else
                  @php $noraitingavailable = "No rating available"; @endphp
                @endif
              @endif
            @endforeach
            @if (isset($noraitingavailable))
              {{ $noraitingavailable }}
            @endif
          </td>
        </tr>
      @endforeach
    </table>
  </div>
@endsection
