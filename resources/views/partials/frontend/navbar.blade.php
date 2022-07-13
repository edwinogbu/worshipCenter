<style type="text/css">

    #nav-menu-container{
     padding: 5px 35px;
     /* margin: auto; */

    border: 5px solid #fae206;
    background-color: #002147;
    border-radius: 2px 2px 45px 45px;

    /* width:960px ; */
    }

    #logo{

    font-family: "Raleway", sans-serif;
    /* font-weight: 500; */
    font-size: 14px;
    letter-spacing: 1px;
    display: inline-block;
    padding: 15px 15px;
    border-radius:2px 2px 45px 45px;
    transition: 0.5s;
    line-height: 0.4;
    margin: 1px;
    color: #fff;
    -webkit-animation-delay: 0.8s;
    animation-delay: 0.2s;
    /* border: 2px solid #c47c89; */
    border: 5px solid #fae206;

    /* width:400px ; */
    background: #ffffff;
    margin-bottom: 0px;
    }

    #ministry{
    border-radius: 12px 3px;
    transition: 0.2s;
    margin: 10px;
    color: #fff;
    -webkit-animation-delay: 0.8s;
    animation-delay: 0.2s;
    border: 2px solid #c47c89;
    }


    .nav-menu li.home a {
    font-family: "Raleway", sans-serif;
    font-weight: 500;
    font-size: 14px;
    letter-spacing: 1px;
    display: inline-block;
    padding: 12px 32px;
    border-radius: 3px 7px;
    transition: 0.5s;
    line-height: 0.4;
    margin: 10px;
    color: #fff;
    -webkit-animation-delay: 0.8s;
    animation-delay: 0.2s;
    border: 2px solid #fae206;

    background: #f82249;
    /* background: #fae206; */

    margin-top: 2px;

}


.nav-menu li.home a :hover {
  /* background: #f82249; */
  background: #fae206;
      /* border: 5px solid #fae206; */

  color: #fff;
}





hr{
   color: #fff;
    background-color: #ffffff;
    padding: 2px 2px;
    /* border: 5px solid #e11; */
    /* background: #fae206; */
    background: #f8ffff;

    margin-top: 50px;
    line-height: 10;
    border-bottom: 2px solid #f82249;


}
.worship-time {
    background: #fff;
}

element.style {
}
[data-aos][data-aos][data-aos-delay="100"].aos-animate, body[data-aos-delay="100"] [data-aos].aos-animate {
    transition-delay: .1s;
}


.worship-time > li{
   padding: 5px;
   margin: auto;
   text-decoration-color: none;
   line-height: 50px;
   color: #000;
   background-color: #ddd;
   /* border: 5px solid red; */
   box-sizing: 10px;

}

/* .sch{ */
  body {
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    min-height: 1px;
    padding: 1.25rem;
}
/* } */
*, ::after, ::before {
    box-sizing: border-box;
}

div {
    display: block;
}
.schcard {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: transparent;
    background-clip: border-box;
    border: 1px solid rgba(0,0,0,.125);
    border-radius: .25rem;
}


image{
    border-radius: 50px;
    background-color: transparent;
}
.logo-name{
   color: #002147;
   background: #f8ffff;
   font-size: large;
   font-style: italic;
   font-weight: 900;

}
  </style>
<!-- ======= Header ======= -->
  <header id="header">
    <div class="container">
        @if (Route::has('user.login'))

      <div id="logo" class="pull-left" style="

background-image: url('img/logo-mega-glory-full.png');

 background-repeat:no-repeat;
background-size:fill;
background: transparent;
/* width: 100%;
padding: 0.625rem 0;
font-size: 1rem;
color: #fff;
letter-spacing: 0.062rem;
margin-bottom: 1.875rem;
border: none;
border-bottom: 0.085rem solid #fff;
outline: none; */
      ">
            <!-- Uncomment below if you prefer to use a text logo -->
            <span><h6><a href="{{ url('user/home') }}">
                <div class="text-center">
                    <img src="{{  asset('img/logo-mega-glory-crest.png')}}" width="100px" height="100%" alt="TheEvenet">
                    <br>
                    <span class="logo-name">MEGA</span> <span class="logo-name">GLORY</span> <br>
                    <br>
                <span class="logo-name">INTERDENOMINATION</span> <span class="logo-name">MINISTRY</span>
                </div>
            </a>
            </h6>
            </span>
                @auth

                {{-- <span> <a href="{{ route('/') }}" class="scrollto "><img src="{{ asset('img/agclogo.png')}}" alt="logo image" title="agc logo" class="img-circle"></a></span> --}}
                @endauth
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu pull-left justify-between-center">
          <li class=" menu-active home about-btn"><a href="{{ url('/') }}">Home</a></li>
          <li><a href="{{ url('blog') }}" id=" "> Blog  </a>
            <ul>
              <li><a href="{{ url('about') }}" id=" ">About</a></li>
              <li><a href="{{ url('gallery') }}" id="#">Gallery</a></li>
              <li ><a href="{{ url('blog')}}">Youth</a></li>
            <li><a href="{{url('blog') }}">Teens</a></li>
            <li><a href="#">Music</a></li>


          </ul>
          </li>


          <li class="drop-down " id=" "><a href="">Ministries</a>
            <ul id=" ">
              <li><a href="{{ url('blog') }}">Men Ministries</a></li>

              <li ><a href="{{ url('blog') }}">Youth</a></li>
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
          <li><a href="{{ url('sermon') }}" id=" ">Sermon</a></li>


        </ul>
        <ul id="l" class="nav-menu pull-right justify-between-center ">

          {{-- <li  class="buy-tickets"><a href="#">Sign in</a></li> --}}
          <li class="tickets"><a href="{{ url('contact') }}">Contact Us</a></li>
          @auth
          <li   class="buy-tickets"><a href="{{ url('user/home') }}">dashboard</li>
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

  </header><!-- End Header -->
