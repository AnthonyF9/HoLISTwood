<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/default.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/back-style.css') }}" />
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <title>@yield('title')</title>
  </head>
  <body>
    <div id="wrapper">
      <header>
        <div id="titreHeader">
          <h1> Panneau de contrôle </h1>
          <h2><a href="{{ route('home') }}">Retourner sur le site</a></h2>
        </div>
        <nav>
          <ul>
            <li><a href="{{ route('dashboard') }}" class="@yield('activedashboard')">Accueil du panneau de contrôle</a></li>
            <li><a href="./back-users.php">Utilisateurs</a></li>
            <li><a href="{{ route('movieslist') }}" class="@yield('activemovieslist')">Films</a></li>
            <li><a href="{{ route('addimdb') }}" class="@yield('activeaddimdb')">Ajouter un film</a></li>
            <li><a href="./back-movies-moderation.php">Films à modérer</a></li>
            <li><a href="./back-comments.php">Commentaires</a></li>
          </ul>
        </nav>
      </header>

        <main>

          <div id="stats">
            @yield('content-alpha')
            @yield('content-beta')
          </div>

        </main>

        <footer>

        </footer>
   <script type="text/javascript" src="{{ asset('js/jquery-3.2.1.js') }}"></script>
   <script type="text/javascript" src="{{ asset('js/jquery-ui.js') }}"></script>
   <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
 </div>
</body>
</html>
