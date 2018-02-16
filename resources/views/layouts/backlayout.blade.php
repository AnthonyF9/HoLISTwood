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
          <h1><a href="{{ route('dashboard') }}"> Dashboard Holistwood </a></h1>
          <h2><a href="{{ route('home') }}">Back to site</a></h2>
        </div>
        <nav id="main_menu_nav">
  				<div id="main_menu_nav_part1" class="main_menu_nav_part">
  					<h3><a href="{{ route('dashboard') }}" class="@yield('activedashboard')">Dashboard home</a></h3>
  				</div>
  				<div id="main_menu_nav_part2" class="main_menu_nav_part">
  					<h3><a href="{{ route('userslist') }}" class="@yield('activeuserslist')">Users</a></h3>
  				</div>
  				<div id="main_menu_nav_part3" class="main_menu_nav_part">
  					<h3 class="@yield('activemovieslist') @yield('activeaddimdb') @yield('activemoderatemovieslist')">Movies</h3>
  					<input type="checkbox" id="cb_tutorials" />
  					<label for="cb_tutorials"></label>
  					<ul>
  						<li class="transition_css"><a href="{{ route('movieslist') }}" class="@yield('activemovieslist')">Movies list</a></li>
  						<li class="transition_css"><a href="{{ route('addimdb') }}" class="@yield('activeaddimdb')">Add a movie</a></li>
  						<li class="transition_css"><a href="{{ route('moderatemovieslist') }}" class="@yield('activemoderatemovieslist')">Moderate movies submitted by users</a></li>
  					</ul>
  				</div>
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
