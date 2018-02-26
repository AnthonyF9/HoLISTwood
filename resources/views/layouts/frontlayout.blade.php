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
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('img/favicon.png') }}" />
    <title>@yield('title')</title>
    @yield('css')
    <meta name="_token" content="{{ csrf_token() }}">
  </head>
  <body>
    <div id="wrapper">
      <header>
        <nav id="top-menu">
          <div class="social-network">
            <ul>
              <li><a href="https://fr-fr.facebook.com/" target="_blank"><?php echo file_get_contents("img/facebook2.svg"); ?></a></li>
              <li><a href="https://twitter.com/" target="_blank"><?php echo file_get_contents("img/twitter2.svg"); ?></a></li>
              <li><a href="https://www.youtube.com/" target="_blank"><?php echo file_get_contents("img/youtube.svg"); ?></a></li>
              <li><a href="https://plus.google.com/discover" target="_blank"><?php echo file_get_contents("img/google-plus.svg"); ?></a></li>
            </ul>
          </div><!-- .social-network -->
          <div class="log">
            <nav id="large-screen">
              <div class="menu-top">
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
                    @if ($errors->has('email') || $errors->has('password'))
                      <span id="loginerror" style="display:none">Login error</span>
                      {{-- <script type="text/javascript">
                        var loginerror = 'TRUE';
                      </script> --}}
                    @endif
                    {{-- {{ dd($errors) }} --}}
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
                  @auth
                    @if ( Auth::user()->role == 'mod' || Auth::user()->role == 'admin')
                      @if (isset($nbcomm) && $nbcomm != 0)
                        <li><a class="@yield('activemoderation') waitingmoderation" href="{{ route('allreportedcomments') }}">Moderation<span> ({{ $nbcomm }})</span></a></li>
                      @else
                        <li><a class="@yield('activemoderation')" href="{{ route('allreportedcomments') }}">Moderation<span></a></li>
                      @endif
                    @endif
                  @endauth
                </ul><!-- #menu1 -->
              </div><!-- .menu-top -->
            </nav><!-- #large-screen -->
          </div><!-- .log -->
        </nav><!-- #top-menu -->
        <div id="bottom-menu">
          <p id="anim-p">
              <span id="anim-span">
                <a class="@yield('activehome')" href="{{ route('home') }}">
                Holistwood
                </a>
              </span>
          </p>

          <ul id="menu2">
            @if ( Auth::user() )
              <li><a class="@yield('activesubmitmovie')" href="{{ route('submitmoviebyitems') }}">Submit a movie</a></li>
            @endif
            <li><a class="@yield('activemovieslist')" href="{{ route('frontmovieslist') }}">Movies list</a></li>
            <li><a class="@yield('activecalendar')" href="{{ route('events') }}">Release calendar</a></li>
            <li><a class="@yield('activehome')" href="{{ route('home') }}">Home</a></li>
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
              <li><a class="@yield('activecalendar')" href="{{ route('events') }}">Release calendar</a></li>
              <li><a class="@yield('activemovieslist')" href="{{ route('frontmovieslist') }}">Movies list</a></li>
              @else
                @if ( Auth::user()->role == 'admin')
                  <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                @endif
                @if ( Auth::user()->role == 'mod' || Auth::user()->role == 'admin')
                  <li><a class="@yield('activereportedcomments')" href="{{ route('allreportedcomments') }}">Reported comments</a></li>
                @endif
                @if ( Auth::user() )
                  <li><a class="@yield('activecalendar')" href="{{ route('events') }}">Release calendar</a></li>
                  <li><a class="@yield('activemovieslist')" href="{{ route('frontmovieslist') }}">Movies list</a></li>
                 <li><a class="@yield('activesubmitmovie')" href="{{ route('submitmoviebyimdb') }}">Submit a movie</a></li>
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

      <!-- Return to Top -->
      <a href="#" id="return-to-top"><i class="icon-chevron-up"></i></a>

      <footer>

        <div id="footer-top">

          <div class="presentation">
            <p id="anim-p-footer">
                <span id="anim-span-footer">
              <a class="@yield('activehome')" href="{{ route('home') }}">
              Holistwood
              </a>
            </p>
            </span>
            <p>Quo illis ex dotis matrimonii eos fuga statum illis uterque tabernaculum marito semper venerem illis ad fuga et est est.</p>
          </div>



          <div class="views">
            <h4>3 best viewed pages</h4>
            <ul>
              <li>Movie one - xxx views</li>
              <li>Movie two - xxx views</li>
              <li>Movie three - xxx views</li>
            </ul>
          </div>
          <div class="search">
            <p>search</p>
          </div>
        </div>

        <div id="footer-bottom">
          <div class="copyright">
            <ul>
              <li>&copy;Holistwood</li>
              <li><a href="{{ route('about') }}">About</a></li>
              <li><a href="{{ route('staff') }}">Staff</a></li>
              <li><a href="#">Sitemap</a></li>
              <li><a href="#">GTU</a></li>
              <li><a href="#">Charter</a></li>
            </ul>
          </div>

          <div class="social-network">
            <ul>
              <li><a href="https://fr-fr.facebook.com/" target="_blank"><?php echo file_get_contents("img/facebook2.svg"); ?></a></li>
              <li><a href="https://twitter.com/" target="_blank"><?php echo file_get_contents("img/twitter2.svg"); ?></a></li>
              <li><a href="https://www.youtube.com/" target="_blank"><?php echo file_get_contents("img/youtube.svg"); ?></a></li>
              <li><a href="https://plus.google.com/discover" target="_blank"><?php echo file_get_contents("img/google-plus.svg"); ?></a></li>
            </ul>
          </div>


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
