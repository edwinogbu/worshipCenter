  <header id="header">
    <div class="container">
        @if (Route::has('user.login'))

      <div id="logo" class="pull-left">
        <!-- Uncomment below if you prefer to use a text logo -->
         <span><h6><a href="#intro">
            <img src="{{  asset('/img/agclogo.png')}}" alt="TheEvenet">

             <span class="hd">Lagos</span> <span>Section</span></a></h6>
        </span>
            @auth

            <span> <a href="{{ route('user.home') }}" class="scrollto "><img src="{{ asset('img/agclogo.png')}}" alt="logo image" title="agc logo" class="img-circle"></a></span>
            @endauth
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu pull-left justify-between-center">
          <li class=" menu-active home about-btn"><a href="index.html">Home</a></li>
          <li><a href="#speakers" id=" "> Blog  </a>
            <ul>
              <li><a href="#about" id=" ">About</a></li>
              <li><a href="#gallery" id="#">Gallery</a></li>
              <li ><a href="#">Youth</a></li>
            <li><a href="#">Teens</a></li>
            <li><a href="#">Music</a></li>


          </ul>
          </li>


          <li class="drop-down " id=" "><a href="">Ministries</a>
            <ul id=" ">
              <li><a href="#">Men Ministries</a></li>

              <li ><a href="#">Youth</a></li>
                  <li><a href="#">Teens</a></li>
                  <li><a href="#">Music</a></li>
                  <li><a href="#">Welfare</a></li>
                  <li><a href="#">Missioneth</a></li>

                 <li class="drop-down"><a href="#">Women </a>
                <ul>
                <li><a href="#">Y.S</a></li>
              <li><a href="#">ys</a></li>
              <li><a href="#">ys</a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li><a href="#schedule">   </a></li>
          <li><a href="#venue">     </a></li>
          <li><a href="#contact" id=" ">Sermon</a></li>


        </ul>
        <ul id="l" class="nav-menu pull-right justify-between-center ">

          {{-- <li  class="buy-tickets"><a href="#">Sign in</a></li> --}}
          <li class="tickets"><a href="#">Contact Us</a></li>
          @auth
          <li   class="buy-tickets"><a href="{{ url('user.home') }}">dashboard</li>
      @else
          <li class="buy-tickets"><a  href="{{ route('user.login') }}" >Login</a></li>

          @if (Route::has('user.register'))
              <li   class="buy-tickets"><a href="{{ route('user.register') }}" >Register</a></li>
          @endif
      @endauth

        </ul>
         <hr>
    @endif
      </nav><!-- #nav-menu-container -->

    </div>

  </header>
