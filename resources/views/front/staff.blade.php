@extends('layouts/frontlayout')

@section('title')
  Staff - HOLISTWOOD
@endsection

@section('activehome')
active @endsection

@section('bandeau')
  <div class="bandeau">
    <h2>&mdash; Staff &mdash;</h2>
  </div>
 @endsection

@section('content')

  <div id="staff-group">
    <section class="staff">
      <h1>Alison Couroyer</h1>
      <p>An excentric and creative Web-designer. If you love or hate Holistwood web-design, it's because of her.</p>
    </section>
    <section class="staff">
      <h1>Guillaume Giudici</h1>
      <p>Multitask developper and debugger. Also a cinema lover with his own blog. You can check it here : <a href="https://films-et-animes.blogspot.fr/">Les visionnages de Guy</a></p>
    </section>
    <section class="staff">
      <h1>Anthony Fabrégat</h1>
      <p>Project Manager of Holistwood. Loves epic movies and even more their soundtracks.</p>
    </section>
    <section class="staff">
      <h1>Béryl de Vos</h1>
      <p>Creator of the databases, logo of the site (css, js), setting up of the full calendar</p>
    </section>
  </div>

@endsection
