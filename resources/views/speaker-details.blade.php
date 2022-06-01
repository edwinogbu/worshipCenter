
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>AGC</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{  asset('img/favicon.png')}}" rel="icon">
  <link href="{{  asset('img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{  asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{  asset('vendor/venobox/venobox.css')}}" rel="stylesheet">
  <link href="{{  asset('vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
  <link href="{{  asset('vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
  <link href="{{  asset('vendor/aos/aos.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{  asset('css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: TheEvent - v2.3.1
  * Template URL: https://bootstrapmade.com/theevent-conference-event-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

  <style type="text/css">

    #nav-menu-container{
     padding: 5px 35px;
     margin: auto;

    border: 5px solid #010;
    background-color: #000;
    border-radius: 2px 45px;


    }

    #logo{



        font-family: "Raleway", sans-serif;
    font-weight: 500;
    font-size: 14px;
    letter-spacing: 1px;
    display: inline-block;
    padding: 10px 35px;
    border-radius: 2px 45px;
    transition: 0.5s;
    line-height: 0.4;
    margin: 10px;
    color: #fff;
    -webkit-animation-delay: 0.8s;
    animation-delay: 0.2s;
    border: 2px solid #c47c89;

  background: #1d1c1c;




    margin-top: 1px;


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
    border: 2px solid #f82249;

  background: #f82249;




    margin-top: 2px;






}


.nav-menu li.home a :hover {
  background: #f82249;
  color: #fff;
}





hr{
   color: #fff;
    background: #fff;
    padding: 1px 2px;

    margin-top: 50px;
    line-height: 10;


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
   border: 5px solid red;
   box-sizing: 10px;

}


.sch{
  body {
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    min-height: 1px;
    padding: 1.25rem;
}
*, ::after, ::before {
    box-sizing: border-box;
}
user agent stylesheet
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
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid rgba(0,0,0,.125);
    border-radius: .25rem;
}
}

  </style>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="container">
        @if (Route::has('user.login'))

      <div id="logo" class="pull-left">
        <!-- Uncomment below if you prefer to use a text logo -->
         <span><h6><a href="#intro"><span class="hd">lagos</span> <span>Ogba Section</span></a></h6></span>
            @auth

            <span> <a href="{{ route('/home') }}" class="scrollto"><img src="{{ asset('img/agclogo.png')}}" alt="" title=""></a></span>
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


          <li><a href="#contact" id=" ">Sermon</a></li>
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

        </ul>
        <ul id="l" class="nav-menu pull-right justify-between-center ">

          {{-- <li  class="buy-tickets"><a href="#">Sign in</a></li> --}}
          <li class="tickets"><a href="#">Contact Us</a></li>
          @auth
          <li   class="buy-tickets"><a href="{{ url('/home') }}">dashboard</li>
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


  <main id="main" class="main-page">

    <!-- ======= Speaker Details Sectionn ======= -->

   <section id="hotels" class="section-with-bg">
      <div class="container">
        <div class="section-header">
          <h2>Speaker Details</h2>
          <p>Praesentium ut qui possimus sapiente nulla.</p>
        </div>

        <div class="row">
          <div class="col-md-6">

            <div class="card mb-5 mb-lg-0">
              <div class="card-body">

            <img src="{{  asset('img/speakers/1.jpg') }}" alt="Speaker 1" class="img-fluid">
          </div>
          </div>
          </div>

          <div class="col-md-6">
            <div class="details">

            <div class="card mb-5 mb-lg-0">
                <div class="card-body">

              <h2>Brenden Legros</h2>
              <div class="social">
                <a href=""><i class="bi bi-twitter"></i></a>
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
              </div>
              <p>Voluptatem perferendis sed assumenda voluptatibus. Laudantium molestiae sint. Doloremque odio dolore dolore sit. Quae labore alias ea omnis ex expedita sapiente molestias atque. Optio voluptas et.</p>

              <p>Aboriosam inventore dolorem inventore nam est esse. Aperiam voluptatem nisi molestias laborum ut. Porro dignissimos eum. Tempore dolores minus unde est voluptatum incidunt ut aperiam.</p>

              <p>Et dolore blanditiis officiis non quod id possimus. Optio non commodi alias sint culpa sapiente nihil ipsa magnam. Qui eum alias provident omnis incidunt aut. Eius et officia corrupti omnis error vel quia omnis velit. In qui debitis autem aperiam voluptates unde sunt et facilis.</p>
            </div>
          </div>
          </div>
          </div>
          </div>

        </div>
      </div>

    </section>

  </main><!-- End #main -->


  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-info">
            <img src="assets/img/logo.png" alt="TheEvenet">
            <p>In alias aperiam. Placeat tempore facere. Officiis voluptate ipsam vel eveniet est dolor et totam porro. Perspiciatis ad omnis fugit molestiae recusandae possimus. Aut consectetur id quis. In inventore consequatur ad voluptate cupiditate debitis accusamus repellat cumque.</p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="fa fa-angle-right"></i> <a href="#">Home</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="#">About us</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="#">Services</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="fa fa-angle-right"></i> <a href="#">Home</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="#">About us</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="#">Services</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              A108 Adam Street <br>
              New York, NY 535022<br>
              United States <br>
              <strong>Phone:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> info@example.com<br>
            </p>

            <div class="social-links">
              <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
              <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
              <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
              <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
              <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
            </div>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>TheEvent</strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!--
        All the links in the footer should remain intact.
        You can delete the links only if you purchased the pro version.
        Licensing information: https://bootstrapmade.com/license/
        Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=TheEvent
      -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End  Footer -->

  <a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('vendor/jquery.easing/jquery.easing.min.js') }}"></script>
  <script src="{{ asset('vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('vendor/venobox/venobox.min.js') }}"></script>
  <script src="{{ asset('vendor/owl.carousel/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('vendor/superfish/superfish.min.js') }}"></script>
  <script src="{{ asset('vendor/hoverIntent/hoverIntent.js') }}"></script>
  <script src="{{ asset('vendor/aos/aos.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('js/main.js') }}"></script>

</body>

</html>
