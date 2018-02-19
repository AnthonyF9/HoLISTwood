@extends('layouts/frontlayout')

@section('title')
  Site map - HOLISTWOOD
@endsection

@section('activehome')
active @endsection

@section('content')

<div class="sitemap-pages">
  <ul>
    <li><a href="{{ route('home') }}">Home</a></li>
    <li><a href="{{ route('events') }}">Calender</a></li>
    <li><a href="{{ route('intheater') }}">In theater</a></li>
    <li><a href="{{ route('lastupdate') }}">Last update</a></li>
    <li><a href="{{ route('staff') }}">Staff</a></li>
    <li><a href="{{ route('sitemap') }}">Sitemap</a></li>
    <li><a href="{{ route('gtu') }}">GTU</a></li>
    <li><a href="{{ route('charter') }}">Charter</a></li>
  </ul>
</div>

@endsection
