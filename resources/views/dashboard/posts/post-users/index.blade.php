@extends('layouts.mainApp')

@section('content')
<section class="content">

    <div class="row">

      <!-- /.col -->
      <div class="box box-body box-success text-center">
          <div class="box box-primary"></div>
                <a href="{{ route('user.userPost') }}" class="text-center">
                    <p style="margin: 20px; font-weight: 800;">
                    Church Communinty
                    </p>
                </a>
        <div class="box box-primary"></div>
    </div>
      <div class="col-md-9" style="margin-left: 120px;;">
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">

            <li class=""><a href="#timeline" data-toggle="tab" aria-expanded="false">Timeline Activity</a></li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="activity">
              <!-- Post -->
              <div class="post">

            <div class="tab-pane" id="timeline">
              <!-- The timeline -->
              <ul class="timeline timeline-inverse">
                <!-- timeline time label -->
                <li class="time-label">
                      <span class="bg-red">
                        {{ Carbon\Carbon::now()->isoFormat('MMM Do Y') }}
                      </span>
                </li>
                <!-- /.timeline-label -->
                <!-- timeline item -->
                <li>
                  <i class="fa fa-envelope bg-blue"></i>

                  <div class="timeline-item">
                    <span class="time"><i class="fa fa-clock-o"></i> {{ Carbon\Carbon::now()->toTimestring() }}</span>

                    <h3 class="timeline-header"><a href="#">M.G.M Support Team</a></h3>

                    <div class="timeline-body">
                        <h1 class="text-2xl font-medium mb-1">{{ $user->first_name. ' '. $user->sur_name }}</h1>
                        <p style="margin: 20px; font-weight: 800;">
                            Posted {{ $posts->count() }} {{ Str::plural('post', $posts->count()) }} and receieved {{ $user->receivedLikes->count() }} Likes
                        </p>
                    </div>
                    <div class="timeline-footer">
                      {{-- <a class="btn btn-primary btn-xs">Read more</a>
                      <a class="btn btn-danger btn-xs">Delete</a> --}}
                    </div>
                  </div>
                </li>
                <!-- END timeline item -->
                <!-- timeline item -->
                <li>
                  <i class="fa fa-user bg-aqua"></i>

                  <div class="timeline-item">
                    {{-- <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span> --}}

                    {{-- <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request --}}
                    </h3>
                  </div>
                </li>
                <!-- END timeline item -->
                <!-- timeline item -->
                <li>

                  <i class="fa fa-comments bg-yellow time-label"></i>

                @if ($posts->count())
                    @foreach ($posts as $post)
                        <x-post :post="$post"/>

                    @endforeach
                    <div class="timeline-footer pull-right">

                            {{ $posts->links() }}
                    </div>
                @else
                <p>{{ $user->first_name }} does not have any Post</p>
                @endif

                </li>
                <!-- END timeline item -->
                <!-- timeline time label -->
                <li class="time-label">
                      <span class="bg-green">
                        3 Jan. 2014
                      </span>
                </li>
                <!-- /.timeline-label -->
                <!-- timeline item -->
                <li>
                  <i class="fa fa-camera bg-purple"></i>
{{--
                  <div class="timeline-item">
                    <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>

                    <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                    <div class="timeline-body">
                      <img src="http://placehold.it/150x100" alt="..." class="margin">
                      <img src="http://placehold.it/150x100" alt="..." class="margin">
                      <img src="http://placehold.it/150x100" alt="..." class="margin">
                      <img src="http://placehold.it/150x100" alt="..." class="margin">
                    </div>
                  </div> --}}
                </li>
                <!-- END timeline item -->
                <li>
                  <i class="fa fa-clock-o bg-gray"></i>
                </li>
              </ul>
            </div>
            <!-- /.tab-pane -->

            {{-- <div class="tab-pane" id="settings">
              <form class="form-horizontal">
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Name</label>

                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputName" placeholder="Name">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Name</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputName" placeholder="Name">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputExperience" class="col-sm-2 control-label">Experience</label>

                  <div class="col-sm-10">
                    <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputSkills" class="col-sm-2 control-label">Skills</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                      <label>
                        <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                      </label>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-danger">Submit</button>
                  </div>
                </div>
              </form>
            </div> --}}
            <!-- /.tab-pane -->
          </div>
          <!-- /.tab-content -->
        </div>
        <!-- /.nav-tabs-custom -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

  </section>

@endsection
