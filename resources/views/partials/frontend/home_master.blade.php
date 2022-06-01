@include('partials.frontend.head')
<body>

  <!-- ======= Header ======= -->
    @include('partials.frontend.navbar')
  <!-- End Header -->

{{--
  <!-- ======= Intro Section ======= -->
     @include('partials.frontend.carousel')
  <!-- End Intro Section --> --}}






<main id="main" style="background-color: #e0d9d9">


    <!-- ======= About Section ======= -->
    <section id="about" >

        <div class="container" data-aos="fade-up">
            <div class="row mt-4">
              <div class="col-lg-12 text-center m-5">
                <h1 style="text-align: center mb-5">
                    <span style="tion: underline; color:white; text-align:center ">Blog Page</span>
                </h1>

              </div>

            </div>
          </div>

      <div class="container" data-aos="fade-up">
        <div class="row mt-4">
          <div class="col-lg-6 ">
            <h2><span style="tion: underline; color:red; ">Up Coming Program</span></h2>
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
    </section>
    <!-- End About Section -->


{{--
    <!-- ======= Speakers Section ======= -->
     @include('speaker')
  <!-- End Speakers Section--->



    <!-- =======Event/ notice board Schedule Section ======= -->
      @include('noticeboard')
    <!-- End added section --> --}}

    <!-- ======= Blog Section ======= -->
      @yield('content')
    <!-- End blog Section -->

{{--
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
    <!-- End Contact Section --> --}}

</main><!-- End #main -->








  <!-- ======= Footer ======= -->
    @include('partials.frontend.footer')
</html>
