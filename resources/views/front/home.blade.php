@extends('layouts/frontlayout')

@section('title')
  Accueil - HOLISTWOOD
@endsection

@section('activehome')
active @endsection

@section('content')
  <div id="trailer">
    <div class="rwd-trailer">
      <iframe width = "917px" height="490px" src="https://www.youtube.com/embed/a8v__0kHzNg" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
    </div>
  </div>
<?php
  $opts = array(
    'http' => array(
        'method' => "GET"
    )
  );

  $context = stream_context_create($opts);
  $url = 'http://www.omdbapi.com/?t=return&y=2003&apikey=224b73f2';

  $raw = file_get_contents($url, true, $context);
  $json = json_decode($raw, true);

  echo '<pre>';
  print_r($json);
  echo '</pre>';
?>

  <div class="affiches">
    <article class="affiche"> </article>
    <article class="affiche"> </article>
    <article class="affiche"> </article>
    <article class="affiche"> </article>

    <article class="affiche"> </article>
    <article class="affiche"> </article>
    <article class="affiche"> </article>
    <article class="affiche"> </article>
  </div>
@endsection
