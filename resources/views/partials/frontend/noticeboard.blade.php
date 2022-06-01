   <section id="gallery">
        <div class="container col-sm-10 sch" data-aos="fade-up">
            <div class="section-header">
                <section id="schedule" class="section-with-bg schcard">
                        <div class="container col-sm-12" data-aos="fade-up">
                            <div class="section-header">
                            <h2>Notice Board / Event Schedule</h2>
                            <p>Here is our event schedule</p>
                            </div>
                            <h3 class="sub-heading">Please select the tabs to view program</h3>

                            <ul class="nav nav-tabs" role="tablist" data-aos="fade-up" data-aos-delay="100">
                            <li class="nav-item">
                                <a class="nav-link active" href="#day-1" role="tab" data-toggle="tab">Sunday service</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#day-2" role="tab" data-toggle="tab">Bible/prayer Meetings</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#day-3" role="tab" data-toggle="tab">Programms</a>
                            </li>
                            </ul>


                            <div class="tab-content row justify-content-center" data-aos="fade-up" data-aos-delay="200">

                            <!-- Schdule Day 1 -->
                            <div role="tabpanel" class="col-lg-9 tab-pane fade show active" id="day-1">

                                <div class="row schedule-item">
                                    <div class="col-md-3">
                                         <time> <h4>Time</h4></time>
                                    </div>

                                    <div class="col-md-3">
                                            <time> <h4>Speaker</h4></time>
                                    </div>
                                     <div class="col-md-6">
                                        <h4>Resource</h4>
                                    </div>
                                </div>

                                @for ($i = 1; $i <= 1; $i++)
                                    <div class="row schedule-item mb-4">
                                            <div class="col-md-3"><time>7:30:00 AM</time></div>
                                            <div class="col-md-3">
                                                <div class="speaker">
                                                <img src="{{ asset('img/pastor/pastor21.jpg') }}" alt="pastor picture">
                                                </div>

                                            </div>


                                            <div class="col-md-6">

                                                <h4>Theme: <span> <span>hunger and anger.</span></span></h4>
                                                <h4>Spaeker: <span> <span>prophet success.</span></span></h4>
                                                <h4>Topic: <span> <span>Unstoppable Belivers.</span></span></h4>
                                                <h4>Text: <span> <span>1 chronicle 1:9.</span></span></h4>

                                            </div>
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                    </div>
                                @endfor


                            </div>
                            <!-- End Schdule Day 1 -->

                            <!-- Schdule Day 2 -->
                            <div role="tabpanel" class="col-lg-9  tab-pane fade" id="day-2">
                                <div class="row schedule-item">
                                    <div class="col-md-2">
                                         <time> <h4>Time</h4></time>
                                    </div>

                                    <div class="col-md-2">
                                            <time> <h4>Speaker</h4></time>
                                    </div>
                                     <div class="col-md-8">
                                        <h4>Resource</h4>
                                    </div>
                                </div>

                                @for ($i = 1; $i <= 1; $i++)
                                    <div class="row schedule-item mb-4">
                                            <div class="col-md-3"><time>10:00 AM</time></div>
                                            <div class="col-md-3">
                                                <div class="speaker">
                                                    <img src="{{ asset('img/pastor/pastor21.jpg') }}" alt="pastor picture">
                                                </div>

                                            </div>

                                            <div class="col-md-6">

                                                <h4>Theme: <span> <span>hunger and anger.</span></span></h4>
                                                <h4>Spaeker: <span> <span>prophet success.</span></span></h4>
                                                <h4>Topic: <span> <span>Unstoppable Belivers.</span></span></h4>
                                                <h4>Text: <span> <span>1 chronicle 1:9.</span></span></h4>

                                            </div>
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                    </div>
                                @endfor

                            </div>
                            <!-- End Schdule Day 2 -->

                            <!-- Schdule Day 3 -->
                            <div role="tabpanel" class="col-lg-9  tab-pane fade" id="day-3">

                                <div class="row schedule-item">
                                    <div class="col-md-3">
                                         <time> <h4>Time</h4></time>
                                    </div>

                                    <div class="col-md-3">
                                            <time> <h4>Speaker</h4></time>
                                    </div>
                                     <div class="col-md-6">
                                        <h4>Resource</h4>
                                    </div>
                                </div>

                                @for ($i = 1; $i <= 1; $i++)
                                    <div class="row schedule-item mb-4">
                                            <div class="col-md-3"><time>10:00 AM</time></div>
                                            <div class="col-md-3">
                                                <div class="speaker">
                                                    <img src="{{ asset('img/pastor/pastor21.jpg') }}" alt="pastor picture">
                                                </div>

                                            </div>


                                            <div class="col-md-6">

                                                <h4>Theme: <span> <span>hunger and anger.</span></span></h4>
                                                <h4>Spaeker: <span> <span>prophet success.</span></span></h4>
                                                <h4>Topic: <span> <span>Unstoppable Belivers.</span></span></h4>
                                                <h4>Text: <span> <span>1 chronicle 1:9.</span></span></h4>

                                            </div>
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                    </div>
                                @endfor

                            </div>
                            <!-- End Schdule Day 2 -->

                            </div>

                        </div>

                </section><!-- End Schedule Section -->
            </div>

        </div>
    </section>
    