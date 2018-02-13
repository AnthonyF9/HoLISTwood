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
          <nav id="top-menu">
            <div class="social-network">
              <ul>
                <li><a href="#"><img src="{{ asset('img/facebook.svg') }}" alt="facebook"></a></li>
                <li><a href="#"><img src="{{ asset('img/twitter.svg') }}" alt="twitter"></a></li>
                <li><a href="#"><img src="{{ asset('img/linkedin.svg') }}" alt="linkedin"></a></li>
                <li><a href="#"><img src="{{ asset('img/google-plus.svg') }}" alt="google-plus"></a></li>
              </ul>
            </div>
            <div class="log">
              <nav id="large-screen">
                <ul id="menu1">
                  @guest
                  <li><button id="myBtn" type="button" name="button">Se connecter</button></li>
                  <li><a class="@yield('activeregister')" href="{{ route('register') }}">S'inscrire</a></li>
                  <div id="myModal" class="modal">
                    <div class="modal-content">
                      <div class="panel panel-default">
                        <span class="close">&times;</span>
                        <div class="panel-heading">Login</div>
                        <div class="panel-body">
                           <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                               {{ csrf_field() }}
                               <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                   <label for="email" class="col-md-4 control-label">E-Mail Address</label>
                                   <div class="col-md-6">
                                       <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                                       @if ($errors->has('email'))
                                           <span class="help-block">
                                               <strong>{{ $errors->first('email') }}</strong>
                                           </span>
                                       @endif
                                   </div>
                               </div>
                               <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                   <label for="password" class="col-md-4 control-label">Password</label>
                                   <div class="col-md-6">
                                       <input id="password" type="password" class="form-control" name="password" required>
                                       @if ($errors->has('password'))
                                           <span class="help-block">
                                               <strong>{{ $errors->first('password') }}</strong>
                                           </span>
                                       @endif
                                   </div>
                               </div>
                               <div class="form-group">
                                   <div class="col-md-6 col-md-offset-4">
                                       <div class="checkbox">
                                           <label>
                                               <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                           </label>
                                       </div>
                                   </div>
                               </div>
                               <div class="form-group">
                                   <div class="col-md-8 col-md-offset-4">
                                       <button type="submit" class="btn btn-primary">Login</button>
                                       <a class="btn btn-link" href="{{ route('password.request') }}">Forgot Your Password?</a>
                                   </div>
                               </div>
                           </form>
                        </div>
                      </div>
                   </div>
                  </div>
                  @else
                  <li id="hello-user">
                    {{-- <div id="logout"> --}}
                      <a href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                         Se déconnecter
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          {{ csrf_field() }}
                      </form>
                    {{-- </div> --}}
                  </li>
                  <li><a class="@yield('activeprofile')" href="{{ route('profile') }}">{{ Auth::user()->name }}</a></li>
                    @if ( Auth::user()->role == 'admin')
                  <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    @endif
                  @endguest
                </ul><!-- #menu1 -->
              </nav><!-- #large-screen -->
            </div>
          </nav>
          <div id="bottom-menu">
            <h1> holistwood </h1>
            <ul id="menu2">
              <li><a class="@yield('activehome')" href="{{ route('home') }}">Accueil</a></li>
            </ul>
          </div>

          <nav role="navigation">
            <div id="menuToggle">
              <input type="checkbox" />
              <span></span>
              <span></span>
              <span></span>
              <ul id="menu">
                <li><a class="@yield('activehome')" href="{{ route('home') }}">Accueil</a></li>
                @guest
                <li><a class="@yield('activeregister')" href="{{ route('register') }}">S'inscrire</a></li>
                <li><a class="@yield('activelogin')" href="{{ route('login') }}">Se connecter</a></li>
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
            </div>
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
