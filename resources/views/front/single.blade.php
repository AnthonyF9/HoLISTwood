@extends('layouts/frontlayout')

@section('title')
  {{$movie->title}} - {{$movie->year}} - HOLISTWOOD
@endsection

@section('content')
  <div class="title">
    <h1>Titre</h1>
  </div>

  <div class="detail-part">
    <div class="affiches">
      <article class="affiche">

      </article>
    </div>

    <div class="detail">
      <ul>
        <li>Date : </li>
        <li>Réalisateur : </li>
        <li>Auteurs : </li>
        <li>Acteurs : </li>
        <li>Producteur : </li>
        <li>Genre : </li>
        <li>Durée : </li>
        <li>Récompenses : </li>
      </ul>
    </div>
  </div>

  <div class="rate">
    <h3>Note :</h3>
  </div>

  <div class="plot">
    <p>synopsis</p>
  </div>

  <div id="trailer">
    <div class="rwd-trailer">
      <iframe width = "917px" height="490px" src="https://www.youtube.com/embed/a8v__0kHzNg" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
    </div>
  </div>

  <div class="comment">
    <h3>Commentaire</h3>
    <div class="comment-list">
      <p></p>
    </div>
  </div>



@endsection
