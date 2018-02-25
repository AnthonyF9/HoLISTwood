@extends('layouts/backlayout')

@section('title')
  Panneau de contrôle - HOLISTWOOD
@endsection

@section('activedashboard','active')

@section('content-alpha')
  Dashboard
  <br/>
  Most ad-listed movies
  <br/>
  Most active users in comments
  <br/>

  <h1>There are actually <b>{{ $totalmovies }}</b> movies on Holistwood !</h2>
@endsection
