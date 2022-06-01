@include('head')
<body>

  <!-- ======= Header ======= -->
    @include('navbar')
  <!-- End Header -->


  <!-- ======= Intro Section ======= -->
     @include('carousel')
  <!-- End Intro Section -->






<main id="main" style="background-color: #e0d9d9">

    <!-- ======= About Section ======= -->
    <section id="about" >
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-lg-6 ">
            <h2><span style="tion: underline; color:red; ">About The Event</span></h2>
            <h3 >
               Mega Glory Holy Ghost Service
            </h3>
          </div>
          <div class="col-lg-3">
            <h3 style="tion: underline; color:red; ">Where</h3>
            <p>  Phase Two Bustop <br>
                Command Road<br>
                lagos States Nigeria<br></p>
          </div>
          <div class="col-lg-3">
            <h3>When</h3>
            <p>Every Sunday<br>3:00 pm - 5:00 pm </p>
          </div>
        </div>
      </div>
    </section><!-- End About Section -->


    <!-- ======= Speakers Section ======= -->
     @include('speaker')
  <!-- End Speakers Section--->



    <!-- =======Event/ notice board Schedule Section ======= -->
      @include('noticeboard')
    <!-- End added section -->

    <!-- ======= Blog Section ======= -->
    <section id="hotels" class="section-with-bg">

      <div class="container aos-init aos-animate" data-aos="fade-up">
        <div class="section-header">
          <h2>Blog</h2>
          <p>A.G.C News Section</p>
        </div>

        <div class="row aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">

          <div class="col-lg-4 col-md-6">
            <div class="hotel">
              <div class="hotel-img">
                <img src="{{ asset('/img/church/4.jpg')}}" alt="Hotel 1" class="img-fluid">
              </div>
              <h3><a href="#">Church Gist</a></h3>
              <div class="stars">
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
              </div>
              <p>author:eddy</p>
              <p>faith by the same Spirit, to another gifts of healing by that one Spirit, to
              another miraculous powers, to another prophecy, to another distinguishing
              between spirits, to another speaking in different kinds of tongues, and to still
              another the interpretation of tongues.

              </p>
              <p><a href="#" class="btn btn-secondary btn-outline-danger text-white">Read More</a></p>


          </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="hotel">
              <div class="hotel-img">
                <img src="{{  ('/img/church/2.jpg') }}" alt="Hotel 2" class="img-fluid">
              </div>
              <h3><a href="#">Holy Ghost Feast</a></h3>
              <div class="stars">
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill-half-full"></i>
              </div>
              <p>author:eddy</p>
              <p>faith by the same Spirit, to another gifts of healing by that one Spirit, to
                another miraculous powers, to another prophecy, to another distinguishing
                between spirits, to another speaking in different kinds of tongues, and to still
                another the interpretation of tongues.
                </p>
                <p><a href="#" class="btn btn-secondary btn-outline-danger text-white">Read More</a></p>

            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="hotel">
              <div class="hotel-img">
                <img src="{{  ('/img/church/3.jpg') }}" alt="Hotel 3" class="img-fluid">
              </div>
              <h3><a href="#">Prophetic Mantle</a></h3>
              <div class="stars">
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
              </div>
              <p>author:eddy</p>
              <p>faith by the same Spirit, to another gifts of healing by that one Spirit, to
              another miraculous powers, to another prophecy, to another distinguishing
              between spirits, to another speaking in different kinds of tongues, and to still
              another the interpretation of tongues.
              </p>

              <p><a href="#" class="btn btn-secondary btn-outline-danger text-white">Read More</a></p>

            </div>
          </div>

        </div>
      </div>

    </section>
    <!-- End blog Section -->


    <!-- ======= Booking Section ======= -->
     @include('appointment')
    <!-- End Buy Ticket Section -->



    <!-- ======= Testimonies Section ======= -->
     @include('testimony')
    <!-- End Testimonies Section -->



    <!-- ======= Gallery Section ======= -->
   @include('gallery')
    <!-- End Gallery Section -->


    <!-- ======= Supporters/Partnership Section ======= -->
    @include('donate')
    <!-- End Sponsors Section -->



    <!-- =======  F.A.Q Section ======= -->
       @include('faq')
    <!-- End  F.A.Q Section -->

    <!-- ======= Subscribe Section ======= -->
        @include('subscribe')
    <!-- End Subscribe Section -->


    <!-- ======= Contact Section ======= -->
     @include('contact')
    <!-- End Contact Section -->

</main><!-- End #main -->








  <!-- ======= Footer ======= -->
    @include('footer')
</html>
