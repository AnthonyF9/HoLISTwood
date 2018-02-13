<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="{{ asset('css/reset.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/default.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/front-style.css') }}" />
        <link href="https://fonts.googleapis.com/css?family=Orbitron" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #2D2D2D;
                color: #636b6f;
                font-weight: 100;
            }

            main {
              position: relative;
              height: 50vh;
              padding: 0;
              width: 100%;
              text-align: center;
              display: flex;
              flex-direction: column;
              justify-content: center;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 36px;
                padding: 20px;
                color: #FFF;
                font-family: 'Raleway', sans-serif;
            }
            .title h1 {
              font-size: 3em;
              font-weight: bold;
              color: #2392F0;
            }
            a {
              text-decoration: none;
              color: #2392F0;
            }
            #retour {
              font-size: 0.8em;
            }
        </style>
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
                @if ( Auth::user()->role == 'admin')
              <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                @endif
              <li><a class="@yield('activeprofile')" href="{{ route('profile') }}">{{ Auth::user()->name }}</a></li>
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

            <div class="content">
                <div class="title">
                  <h1>@yield('nberror')</h1>
                    @yield('message')
                    <a href="{{ route('home') }}"><p id="retour">Accueil</p></a>
                </div>
            </div>

        </main>

       <script type="text/javascript" src="{{ asset('js/jquery-3.2.1.js') }}"></script>
       <script type="text/javascript" src="{{ asset('js/jquery-ui.js') }}"></script>
       <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
     </div>
   </body>
</html>
