@extends('layouts/backlayout')

@section('title')
  Panneau de contrôle - HOLISTWOOD
@endsection

@section('activedashboard','active')

@section('content-alpha')
  <h1>Dashboard</h1>

  <div class="stats-zone">
    <h2>There are actually <b>{{ $totalmovies }}</b> movies on Holistwood !</h2>
  </div>

  <div class="stats-zone">
    <h2>Most added movies</h2>
    <ul>
      @foreach ($mostaddlistedmovies as $key => $value)
        @if ($key < 10)
          <li>{{ $value->title }} : <b>added {{ $value->count }} @if ($value->count > 1) times. @else time. @endif</b></li>
        @endif
      @endforeach
    </ul>
  </div>

  <div class="stats-zone">
    <h2>Most active users in comments</h2>
    <ul>
      @foreach ($mostactiveusersincomments as $key => $value)
        @if ($key < 10)
          <li>{{ $value->name }} has commented <b>{{ $value->count }} @if ($value->count > 1) times. @else time. @endif</b></li>
        @endif
      @endforeach
    </ul>
  </div>
@endsection
