@extends('layouts/frontlayout')

@section('title')
  About - HOLISTWOOD
@endsection

@section('activehome')
active @endsection

@section('bandeau')
  <div class="bandeau">
    <h2>&mdash; About &mdash;</h2>
  </div>
 @endsection

@section('content')

<div id="about-group">
  <section class="about">
    <h4>Create your list</h4>
    <p>Create and edit your personnal movies list from our movies catalog.</p>
  </section>
  <section class="about">
    <h4>Personalize your calendar</h4>
    <p>You can personalize your own release calendar for being aware about the release of your movie when you want to see.</p>
  </section>
  <section class="about">
    <h4>Add movies</h4>
    <p>If your favorite movies is not to our catalog, you can submit it by title and year or by IMDB.</p>
  </section>
  <section class="about">
    <h4>Rate and comment movies</h4>
    <p>You can rate and take your opinion about a movie.</p>
  </section>
</div>

@endsection
