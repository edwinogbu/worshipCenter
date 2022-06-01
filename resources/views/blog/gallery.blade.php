@extends('partials.frontend.home_master')

@section('content')
<div class="row">
<div class="col-md-9">


<section id="hotels" class="section-with-bg">

      <div class="container aos-init aos-animate" data-aos="fade-up">
        <div class="row aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">

          <div class="col-lg-12 col-md-12">
            <div class="hotel">
              
{{--               
            <div class="card top-selling">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                      <input type="search" class="form-control">
                    </li>
                  </ul>
                </div>

                <div class="card-body pb-0">
                  <h5 class="card-title">
                       
                <div class="section-header">
                    <h2>Papa's Message</h2>
                </div>
                   <span></span></h5>

                  <table class="table table-borderless">
                    <thead>
                      <tr>
                        <th scope="col">Preview</th>
                        <th scope="col">Message</th>
                        <th scope="col">Date</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row"><a href="#">
                       <img src="{{  ('/img/church/7.jpg') }}" alt="Hotel 2" height="50" width="70" class="img-fluid">
                        </a></th>
                        <td><a href="{{ url('sermon-note') }}" class="text-primary fw-bold">Eden The House Of God</a></td>
                        <td>April 22nd 2022</td>
                        <td class="fw-bold">
                        
                            <a href="#" class="btn btn-secondary btn-sm btn-outline-danger text-white">Download<i class="fa fa-download mx-1"></i></a>
                        </td>
                      </tr>
                     
                    </tbody>
                  </table>

                </div>

            </div> --}}


            <div class="row g-0">


          <div class="col-lg-3 col-md-4">
            <div class="venue-gallery">
              <a href="{{ asset('img/venue-gallery/8.jpg')}}" class="glightbox" data-gall="venue-gallery">
                <img src="{{ asset('img/venue-gallery/8.jpg')}}" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="venue-gallery">
              <a href="{{ asset('img/venue-gallery/1.jpg')}}" class="glightbox" data-gall="venue-gallery">
                <img src="{{ asset('img/venue-gallery/1.jpg')}}" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="venue-gallery">
              <a href="{{ asset('img/venue-gallery/2.jpg')}}" class="glightbox" data-gall="venue-gallery">
                <img src="{{ asset('img/venue-gallery/2.jpg')}}" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="venue-gallery">
              <a href="{{ asset('img/venue-gallery/3.jpg')}}" class="glightbox" data-gall="venue-gallery">
                <img src="{{ asset('img/venue-gallery/3.jpg')}}" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="venue-gallery">
              <a href="{{ asset('img/venue-gallery/4.jpg')}}" class="glightbox" data-gall="venue-gallery">
                <img src="{{ asset('img/venue-gallery/4.jpg')}}" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="venue-gallery">
              <a href="{{ asset('img/venue-gallery/5.jpg')}}" class="glightbox" data-gall="venue-gallery">
                <img src="{{ asset('img/venue-gallery/5.jpg')}}" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="venue-gallery">
              <a href="{{ asset('img/venue-gallery/6.jpg')}}" class="glightbox" data-gall="venue-gallery">
                <img src="{{ asset('img/venue-gallery/6.jpg')}}" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="venue-gallery">
              <a href="{{ asset('img/venue-gallery/7.jpg')}}" class="glightbox" data-gall="venue-gallery">
                <img src="{{ asset('img/venue-gallery/7.jpg')}}" alt="" class="img-fluid">
              </a>
            </div>
          </div>

        </div>


            </div>
          </div>

          {{-- <div class="col-lg-4 col-md-6">
            <div class="hotel">
              <div class="hotel-img">
                <img src="{{  ('/img/church/7.jpg') }}" alt="Hotel 2" height="100" class="img-fluid">
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
          </div> --}}

          {{-- <div class="col-lg-4 col-md-6">
            <div class="hotel">
              <div class="hotel-img">
                <img src="{{  ('/img/church/1.jpg') }}" alt="Hotel 3" height="100" class="img-fluid">
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
          </div> --}}

        </div>
      </div>

</section>



</div>

<div class="col-md-3">
    <section id="hotels" class="section-with-bg">
      <div class="container aos-init aos-animate" data-aos="fade-up">

            <h3 class="sidebar-title">Latest Posts</h3>
              <div class="form-group">
                <div class="post-item clearfix">
                  <img src="{{  ('/img/church/3.jpg') }}" height="100px" width="200px" alt="">
                  <h3><a href="#">Church Gist</a></h3>
                    <div class="stars">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    </div>
                </div>
     



   <br>
   
<section id="contact" class="section-bg">
  <div class="container" data-aos="fade-up">
     <div class="section-header">
       


        <div class="section-header">
          <h2>Newsletter</h2>

        </div>

        <div class="form">
          <form action="forms/contact.php" method="post" role="form" class="php-email-form">
            <div class="form-row">
              <div class="form-group col-md-6">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validate"></div>
              </div>
              <div class="form-group col-md-6">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                <div class="validate"></div>
              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
              <div class="validate"></div>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
              <div class="validate"></div>
            </div>
            <div class="mb-3">
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your message has been sent. Thank you!</div>
            </div>
            <div class="text-center"><button type="submit">Send Message</button></div>
          </form>
     </div>




      <h3 class="sidebar-title">Recent Posts</h3>
              <div class="form-group">
                <div class="post-item clearfix">
                  <img src="{{  ('/img/church/3.jpg') }}" height="100px" width="200px" alt="">
                  <h6><a href="blog-single.html">New age</a></h6>
                  <time datetime="2020-01-01">Jan 1, 2020</time>
                </div>

                <div class="form-group clearfix">
                  <img src="{{  ('/img/church/3.jpg') }}" height="100px" width="200px" alt="">
                  <h6><a href="blog-single.html">church gist</a></h6>
                  <time datetime="2020-01-01">Jan 1, 2020</time>
                </div>

              
              </div>
  </div>
</section>



<style>

.sidebar {
    padding: 30px;
    margin: 0 0 60px 20px;
    box-shadow: 0 4px 16px rgb(0 0 0 / 10%);
}
/* *, ::after, ::before {
    box-sizing: border-box;
}
div {
    display: block;
}
.row {
    --bs-gutter-x: 1.5rem;
    --bs-gutter-y: 0;
    display: flex;
    flex-wrap: wrap;
    margin-top: calc(-1 * var(--bs-gutter-y));
    margin-right: calc(-.5 * var(--bs-gutter-x));
    margin-left: calc(-.5 * var(--bs-gutter-x));
}
 */

</style>

      {{-- <div class="container" data-aos="fade-up">

          <div class="section-header">
              <h2>Contact Us</h2>
              <p>A.G.C. Command Worship Center</p>
           </div>

        <div class="row contact-info">

          <div class="col-md-4">
            <div class="contact-address">


            <div class="sidebar">

              <h3 class="sidebar-title">Search</h3>
              <div class="sidebar-item search-form">
                <form action="">
                  <input type="text">
                  <button type="submit"><i class="bi bi-search"></i></button>
                </form>
              </div><!-- End sidebar search formn-->

              <h3 class="sidebar-title">Categories</h3>
              <div class="sidebar-item categories">
                <ul>
                  <li><a href="#">General <span>(25)</span></a></li>
                  <li><a href="#">Lifestyle <span>(12)</span></a></li>
                  <li><a href="#">Travel <span>(5)</span></a></li>
                  <li><a href="#">Design <span>(22)</span></a></li>
                  <li><a href="#">Creative <span>(8)</span></a></li>
                  <li><a href="#">Educaion <span>(14)</span></a></li>
                </ul>
              </div>
              <!-- End sidebar categories-->

              <h3 class="sidebar-title">Recent Posts</h3>
              <div class="sidebar-item recent-posts">
                <div class="post-item clearfix">
                  <img src="{{  ('/img/church/3.jpg') }}" alt="">
                  <h4><a href="blog-single.html">Nihil blanditiis at in nihil autem</a></h4>
                  <time datetime="2020-01-01">Jan 1, 2020</time>
                </div>

                <div class="post-item clearfix">
                  <img src="{{  ('/img/church/3.jpg') }}" alt="">
                  <h4><a href="blog-single.html">Quidem autem et impedit</a></h4>
                  <time datetime="2020-01-01">Jan 1, 2020</time>
                </div>

                <div class="post-item clearfix">
                  <img src="{{  ('/img/church/3.jpg') }}" alt="">
                  <h4><a href="blog-single.html">Id quia et et ut maxime similique occaecati ut</a></h4>
                  <time datetime="2020-01-01">Jan 1, 2020</time>
                </div>

                <div class="post-item clearfix">
                  <img src="{{  ('/img/church/3.jpg') }}" alt="">
                  <h4><a href="blog-single.html">Laborum corporis quo dara net para</a></h4>
                  <time datetime="2020-01-01">Jan 1, 2020</time>
                </div>

                <div class="post-item clearfix">
                  <img src="{{  ('/img/church/3.jpg') }}" alt="">
                  <h4><a href="blog-single.html">Et dolores corrupti quae illo quod dolor</a></h4>
                  <time datetime="2020-01-01">Jan 1, 2020</time>
                </div>

              </div>
              <!-- End sidebar recent posts-->

              <h3 class="sidebar-title">Tags</h3>
              <div class="sidebar-item tags">
                <ul>
                  <li><a href="#">App</a></li>
                  <li><a href="#">IT</a></li>
                  <li><a href="#">Business</a></li>
                  <li><a href="#">Mac</a></li>
                  <li><a href="#">Design</a></li>
                  <li><a href="#">Office</a></li>
                  <li><a href="#">Creative</a></li>
                  <li><a href="#">Studio</a></li>
                  <li><a href="#">Smart</a></li>
                  <li><a href="#">Tips</a></li>
                  <li><a href="#">Marketing</a></li>
                </ul>
              </div><!-- End sidebar tags-->

            </div><!-- End sidebar -->

            </div>
         </div>
     </div>
</div> --}}


   </div>

</section>


   
@endsection