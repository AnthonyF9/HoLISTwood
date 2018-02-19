@extends('layouts/frontlayout')

@section('title')
  Submit a movie - HOLISTWOOD
@endsection

@section('activesubmitmovie')
active @endsection



@section('content')
  <div id="submitmovie">

    <nav>
      <ul>
        <li><a class="@yield('activesubmitmoviebyitems')" href="{{ route('submitmoviebyitems') }}">Submit a movie by filling infos</a></li>
        <li><a class="@yield('activesubmitmoviebyimdb')" href="{{ route('submitmoviebyimdb') }}">Submit a movie with IMDB</a></li>
      </ul>
    </nav>

    @yield('content-beta')

  </div>

@endsection
