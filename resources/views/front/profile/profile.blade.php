@extends('layouts/frontlayout')

@section('title')
  Votre profil - HOLISTWOOD
@endsection

@section('activeprofile')
active @endsection

@section('content')
  <div class="profile-head">
    <img src="{{ asset('img/avatar.svg') }}" alt="avatar">
    <h1>{{ Auth::user()->name }}</h1>
    <div class="profile-button">
      <input type="button" name="pm" value="Private Message">
      <input type="button" name="request" value="Friend Request">
    </div>
    <div class="profile-description">
      <p>Description</p>
    </div>
  </div>

  <nav class="profile-menu">
    <ul>
      <li><a href="#">Favorite Movie</a></li>
      <li><a href="#">Movie Rate</a></li>
      <li><a href="#">Friend</a></li>
      <li><a href="#">Info</a></li>
      @if (Auth::check())
        <li><a href="#">Setting</a></li>
      @endif
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

  <div class="profile-friend">
    <ul>
      <li><img src="{{ asset('img/avatar.svg') }}" alt="avatar"><a href="#">Pseudo</a></li>
      <li><img src="{{ asset('img/avatar.svg') }}" alt="avatar"><a href="#">Pseudo</a></li>
      <li><img src="{{ asset('img/avatar.svg') }}" alt="avatar"><a href="#">Pseudo</a></li>
    </ul>
  </div>

  <div class="profile-info">
    <section class="section-detail">
      <ul>
        <li>Last Online :</li>
        <li>Gender :</li>
        <li>Birthday :</li>
        <li>Location :</li>
        <li>Joined :</li>
      </ul>
    </section>
    <section class="section-contact">
      <ul>
        <li>E-Mail :</li>
        <li>Website :</li>
        <li>Skype :</li>
        <li>Discord :</li>
        <li>Facebook :</li>
        <li>Twitter :</li>
        <li>LinkedIn :</li>
        <li>Google+ :</li>
      </ul>
    </section>
  </div>

  <div class="profile-setting">
    <nav class="setting-menu">
      <ul>
        <li><a href="#">Info</a></li>
        <li><a href="#">Avatar</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
    </nav>

    <div class="setting-content setting-info">
      <form class="info" action="" method="post">
        <div class="form-setting">
          <label for="birthday">Birthday :</label><input type="date" name="birthday" value="">
        </div>
        <div class="form-setting">
          <label for="gender">Gender :</label><select class="gender-list" name="gender">
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
          </select>
        </div>
        <div class="form-setting">
          <label for="location">Location :</label><input type="text" name="location" value="">
        </div>
        <div class="form-setting">
          <label for="description">Description :</label><textarea name="description" rows="8" cols="80"></textarea>
        </div>
        <input type="submit" name="valid" value="Validate" formnovalidate>
      </form>
    </div>

    <div class="setting-content setting-avatar">
      <div class="visual-avatar">
        <img src="{{ asset('img/avatar.svg') }}" alt="avatar">
      </div>
      <input type="button" name="avatar" value="Choose a file" formnovalidate>
    </div>

    <div class="setting-content setting-contact">
      <form class="contact" action="" method="post">
        <div class="form-setting">
          <label for="email">E-Mail :</label><input type="email" name="email" value="">
        </div>
        <div class="form-setting">
          <label for="website">Website :</label><input type="text" name="website" value="">
        </div>
        <div class="form-setting">
          <label for="skype">Skype :</label><input type="text" name="skype" value="">
        </div>
        <div class="form-setting">
          <label for="discord">Discord :</label><input type="text" name="discord" value="">
        </div>
        <div class="form-setting">
          <label for="facebook">Facebook :</label><input type="text" name="facebook" value="">
        </div>
        <div class="form-setting">
          <label for="twitter">Twitter :</label><input type="text" name="twitter" value="">
        </div>
        <div class="form-setting">
          <label for="linkedin">LinkedIn :</label><input type="text" name="linkedin" value="">
        </div>
        <div class="form-setting">
          <label for="google">Google+ :</label><input type="text" name="google" value="">
        </div>
        <input type="submit" name="valid" value="Validate" formnovalidate>
      </form>
    </div>
  </div>
@endsection
