<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/default.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/front-style.css') }}" />
    <link href="https://fonts.googleapis.com/css?family=Orbitron" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <title>@yield('title')</title>
  </head>
  <body>
    <div id="wrapper">
      <header>
        <h1> holistwood </h1>
        <nav>
          <ul>
            <li><a class="@yield('activehome')" href="{{ route('home') }}">Accueil</a></li>
            @guest
            <li><a class="@yield('activelogin')" href="{{ route('login') }}">Se connecter</a></li>
            <li><a class="@yield('activeregister')" href="{{ route('register') }}">S'inscrire</a></li>
            @else
            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li><a class="@yield('activeprofile')" href="{{ route('profile') }}">{{ Auth::user()->username }}</a></li>
            <li id="hello-user">
                   <div id="logout"><a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                       Se déconnecter
                     </a>
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                         {{ csrf_field() }}
                     </form>
                   </div>
                 </li>
            @endguest
          </ul>
        </nav>
      </header>

      <main>


        @yield('content')

      </main>

      <footer>

     </footer>
     <script type="text/javascript" src="{{ asset('js/jquery-3.2.1.js') }}"></script>
     <script type="text/javascript" src="{{ asset('js/jquery-ui.js') }}"></script>
     <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
   </div>
 </body>
</html>
