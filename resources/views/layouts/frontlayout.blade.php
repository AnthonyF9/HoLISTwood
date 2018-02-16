<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/default.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/set1.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/front-header-style.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/front-main-style.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/front-footer-style.css') }}" />
    <link href="https://fonts.googleapis.com/css?family=Orbitron" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.css" rel="stylesheet">
    <title>@yield('title')</title>
    @yield('css')
  </head>
  <body>
    <div id="wrapper">
      <header>
        <nav id="top-menu">
          <div class="social-network">
            <ul>
              <li><a href="#"><?php echo file_get_contents("img/facebook2.svg"); ?></a></li>
              <li><a href="#"><?php echo file_get_contents("img/twitter2.svg"); ?></a></li>
              <li><a href="#"><?php echo file_get_contents("img/youtube.svg"); ?></a></li>
              <li><a href="#"><?php echo file_get_contents("img/google-plus.svg"); ?></a></li>
            </ul>
          </div><!-- .social-network -->
          <div class="log">
            <nav id="large-screen">
              <ul id="menu1">
                @guest
                <li><span id="myBtn" type="button" name="button" >Log in</span></li>
                <li><a class="@yield('activeregister')" href="{{ route('register') }}">Register</a></li>
                <div id="myModal" class="modal">
                  <div class="modal-content">
                    <div class="panel panel-default">
                      <span class="close">&times;</span>
                      <div class="panel-heading">Log in</div>
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
                      </div><!-- .panel-body -->
                    </div>
                 </div><!-- .modal-content -->
               </div><!-- #myModal -->
                @else
                <li id="log">
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                       Log out
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li><!-- #log -->
                <li><a class="@yield('activeprofile')" href="{{ route('profile') }}">{{ Auth::user()->name }}</a></li>
                  @if ( Auth::user()->role == 'admin')
                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                  @endif
                @endguest
              </ul><!-- #menu1 -->
            </nav><!-- #large-screen -->
          </div><!-- .log -->
        </nav><!-- #top-menu -->
        <div id="bottom-menu">
          <p id="anim-p">
            <a class="@yield('activehome')" href="{{ route('home') }}">
              <span id="anim-span">
                Holistwood
              </span>
              </a>
            </p>

          <ul id="menu2">
            <li><a class="@yield('activehome')" href="{{ route('home') }}">Home</a></li>
            <li><a class="@yield('activecalendar')" href="{{ route('events') }}">Calender</a></li>
            <li><a class="@yield('')" href="{{ route('intheater') }}">In theater</a></li>
            <li><a class="@yield('')" href="{{ route('lastupdate') }}">Last update</a></li>
             @if ( Auth::user() )
              <li><a class="@yield('')" href="{{ route('favorite') }}">Favorite</a></li>
             @endif
          </ul><!-- #menu2 -->
        </div><!-- #bottom-menu -->

        <nav role="navigation">
          <div id="menuToggle">
            <input type="checkbox" />
            <span></span>
            <span></span>
            <span></span>
            <ul id="menu">
              <li><a class="@yield('activehome')" href="{{ route('home') }}">Home</a></li>
              @guest
              <li><a class="@yield('activeregister')" href="{{ route('register') }}">Register</a></li>
              <li><a class="@yield('activelogin')" href="{{ route('login') }}">Log in</a></li>
              @else
                @if ( Auth::user()->role == 'admin')
              <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                @endif
              <li><a class="@yield('activeprofile')" href="{{ route('profile') }}">{{ Auth::user()->name }}</a></li>
              <li id="hello-user">
                     <div id="logout"><a href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                         Log out
                       </a>
                       <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                           {{ csrf_field() }}
                       </form>
                     </div>
                   </li>
              @endguest
            </ul><!-- #menu -->
          </div><!-- #menuToggle -->
        </nav>
      </header>

      @yield('bandeau')

      <main>

        @yield('content')
        @yield('content-error')

      </main>

      <footer>

        <div id="footer-top">
          <div class="contact-button">
            <button type="button" name="contact"><a href="#">Contact</a></button>
          </div>
          <div class="center">



          </div>
          <div class="social-network">
            <ul>
              <li><a href="#"><?php echo file_get_contents("img/facebook2.svg"); ?></a></li>
              <li><a href="#"><?php echo file_get_contents("img/twitter2.svg"); ?></a></li>
              <li><a href="#"><?php echo file_get_contents("img/youtube.svg"); ?></a></li>
              <li><a href="#"><?php echo file_get_contents("img/google-plus.svg"); ?></a></li>
            </ul>
          </div>
        </div>
        <div id="footer-center">
          <ul>
            <li><a href="#">Staff</a></li>
            <li><a href="#">Sitemap</a></li>
            <li><a href="#">GTU</a></li>
            <li><a href="#">Charter</a></li>
          </ul>
        </div>
        <div id="footer-bottom">
          <p>&copy; Holistwood</p>
        </div>
     </footer>
     <script type="text/javascript" src="{{ asset('js/jquery-3.2.1.js') }}"></script>
     <script type="text/javascript" src="{{ asset('js/jquery-ui.js') }}"></script>
     <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
     <script src="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.js"></script>
     <script>
      AOS.init();
     </script>
     @yield('js')
   </div>
 </body>
</html>
