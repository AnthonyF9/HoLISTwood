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
            <li><button id="myBtn" type="button" name="button">Se connecter</button></li>
            {{-- <li><a id="myBtn" class="@yield('activelogin')" href="{{ route('login') }}">Se connecter</a></li> --}}
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
