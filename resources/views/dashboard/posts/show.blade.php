@extends('layouts.mainApp')

@section('content')
<section class="content">

    <div class="row">
        @if (Session::has('message'))
        <div class="alert alert-success alert-dismissible fade show rounded" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span></button> <i class="fa fa-info mx-2"></i>
            <strong>{!! session('message') !!}</strong>
        </div>
        @endif
        @if ($msg=Session::get('success'))
        <div class="alert alert-success">{{ $msg }}</div>
        @endif

        @if ($msg=Session::get('fail'))
        <div class="alert alert-danger">{{ $msg }}</div>
        @endif

        {!! Toastr::message() !!}
      {{-- <div class="col-md-3">

        <!-- Profile Image -->
        <div class="box box-primary">
          <div class="box-body box-profile">
            <img class="profile-user-img img-responsive img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture">

            <h3 class="profile-username text-center">Nina Mcintire</h3>

            <p class="text-muted text-center">Software Engineer</p>

            <ul class="list-group list-group-unbordered">
              <li class="list-group-item">
                <b>Followers</b> <a class="pull-right">1,322</a>
              </li>
              <li class="list-group-item">
                <b>Following</b> <a class="pull-right">543</a>
              </li>
              <li class="list-group-item">
                <b>Friends</b> <a class="pull-right">13,287</a>
              </li>
            </ul>

            <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->

        <!-- About Me Box -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">About Me</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

            <p class="text-muted">
              B.S. in Computer Science from the University of Tennessee at Knoxville
            </p>

            <hr>

            <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

            <p class="text-muted">Malibu, California</p>

            <hr>

            <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

            <p>
              <span class="label label-danger">UI Design</span>
              <span class="label label-success">Coding</span>
              <span class="label label-info">Javascript</span>
              <span class="label label-warning">PHP</span>
              <span class="label label-primary">Node.js</span>
            </p>

            <hr>

            <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div> --}}
      <!-- /.col -->
      <div class="box box-body">
        <h4 class="text-center">Church Communinty</h4>
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
                         <form action="{{ route('user.userPost') }}" method="POST" class="form-horizontal"  enctype="multipart/form-data">
                            @csrf
                            <div class="box-body col-md-12">
                                <div class="col-sm-12">
                                    <label for="inputEmail3" class="col-sm-6 control-label">What's On Your Mind</label>

                                  </div>
                              <div class="form-group justify-content-center text-center">

                                <div class="col-sm-10 text-center p-2  justify-content-center">
                                  <textarea name="body" style="margin: 1px; margin-left: 50px; padding: 20px; background-color: white;" class="form-control input-sm p-4 m-5 " rows="10" placeholder="what's on your mind ..."></textarea>
                                </div>
                              </div>


                            </div>
                            <!-- /.box-body -->
                            {{-- <div class="box-footer">

                            </div> --}}
                            <!-- /.box-footer -->
                            <div class="timeline-footer text-center col-md-4-offset-4">
                              <button type="submit" class="btn btn-primary btn-lg pull-center pt-5 " style="width: 30%">Post</button>

                            </div>
                          </form>

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
{{--
                    @if ($posts->count())
                        @foreach ($posts as $post) --}}
                           <x-post :post="$post"/>

                        {{-- @endforeach
                        <div class="timeline-footer pull-right">

                                {{ $posts->links() }}
                        </div>
                    @else
                    <p>There are no Post</p>
                    @endif --}}
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
