@extends('layouts/frontlayout')

@section('title')
  Votre profil - HOLISTWOOD
@endsection

@section('activeprofile')
active @endsection

@section('content')
  <div class="profile-head">
    <img src="{{ asset('img/avatar.svg') }}" alt="avatar">
    <h1>Pseudo</h1>
    <!-- {{ Auth::user()->name }} -->
  </div>
  <nav class="profile-menu">
    <ul>
      <li><a href="#">Favorite Movie</a></li>
      <li><a href="#">Movie Rate</a></li>
      <li><a href="#">Setting</a></li>
    </ul>
  </nav>

  <div class="profile-favorite">
    <article class="affiche"> </article>
    <article class="affiche"> </article>
    <article class="affiche"> </article>
  </div>

  <div class="profile-rating">
    <article class="affiche"> </article>
    <article class="affiche"> </article>
    <article class="affiche"> </article>
  </div>

  <div class="profile-setting">
    <nav>
      <ul>
        <li><a href="#">Info</a></li>
        <li><a href="#">Avatar</a></li>
        <li><a href="#">Contact</a></li>
        <li><a href="#">Notification</a></li>
      </ul>
    </nav>

    <div class="setting-info">
      
    </div>

    <div class="setting-avatar">

    </div>

    <div class="setting-contact">

    </div>

    <div class="setting-notificaton">

    </div>
  </div>
@endsection
