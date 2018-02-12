@extends('layouts/backlayout')

@section('title')
  Ajouter un film - HOLISTWOOD
@endsection

@section('activeaddimdb','active')

@section('content-alpha')
  <div class="part">
    <h1>Ajouter un film</h1>
  </div>
@endsection

@section('content-beta')
  <div class="part">
    On récupère le film
    {{ $url }}
  </div>
@endsection
