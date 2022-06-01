@extends('layouts.mainApp')


@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">


    <div class="card-body">
    <section class="content-header">
        <h1>
          {{-- {{ Auth::user()->first_name }}'s Profile --}}
        </h1>

      </section>

      <!-- Main content -->
      <section class="content">

        <div class="row">
          <div class="col-md-4">



              <!-- Profile Image -->
              <div class="box box-primary">
                <div class="box-body box-profile">
                  {{-- @if (auth()->user()->profile->picture ==null) --}}
                  <img class="justify-content-center rounded-circle" src="{{ asset('img/agclogo.png')}}" alt="" title="" height="70px" width="70px">

                    {{-- <img id="showImage" src="{{ url('profile-images/no_image.jpg') }}" style="width: 50px; width: 50px; border: 1px solid #000000; border-radius:50px;"> --}}

                    {{-- @else --}}

                    <img class="profile-user-img img-responsive img-circle" src="{{ asset('img/agclogo.png') }}" alt="User profile picture" height="100">
                    {{-- @endif --}}

                  <h3 class="profile-username text-center">{{ Auth::user()->email }}</h3>
                  <h3 class="profile-username text-center">{{ auth()->user()->role_name }}</h3>
                  <strong style="color:red; backgroud:white"><i class="fa fa-user margin-r-5"></i> <span> {{ Auth::user()->email }}'s Profile:</span ><span style="color:green; backgroud:white">Online</span></strong>
                <!-- /.box-body -->
              </div>
              <div class="box box-danger"></div>
              </div>
              <!-- /.box -->

            <!-- Profile Image -->
            {{-- <div class="box box-primary">
              <div class="box-body box-profile">
                <img class="profile-user-img img-responsive img-circle" src="{{ asset('img/agclogo.png') }}" alt="User profile picture" height="100">
                {{-- <img class="justify-content-center rounded-circle" src="{{ asset('img/agclogo.png')}}" alt="" title="" height="20px" width="20px"> --}}

                {{-- <h3 class="profile-username text-center">{{ Auth::user()->first_name }}</h3>

                <p class="text-muted text-center">Software Engineer</p>

                <ul class="list-group list-group-unbordered">
                  <div class="list-group-item">
                    <b>Tithe Status</b> <a class="pull-right">1,322</a>
                  </div>
                  <div class="list-group-item">
                    <b>Following</b> <a class="pull-right">543</a>
                  </div>
                  <div class="list-group-item">
                    <b>Friends</b> <a class="pull-right">13,287</a>
                  </div>
                </ul>

                <a href="#" class="btn btn-primary btn-block"><b>update Photo</b></a>
              </div> --}}
              <!-- /.box-body -->
            {{-- </div> --}}
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
          </div>
          <!-- /.col -->




<!-- TABLE: LATEST ORDERS -->
<div class="clearfix visible-sm-block"></div>

<div class="col-md-8 col-sm-8 col-xs-8">
  <div class="box box-danger"  >
    <div class="box-header with-border">
      <div class="user-block">
        <img class="justify-content-center rounded-circle" src="{{ asset('img/agclogo.png')}}" alt="" title="" height="20px" width="20px">
        <span class="username">
              <a href="#">position: Men's Leader</a>

            </span>
        <span class="description">Since july 18 - 7:30 PM today</span>
      </div>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="row">
        <div class="col-sm-4">
              <!-- Profile Image -->
              <div class="box box-primary">
                <div class="box-body box-profile">
                  @if (Auth::user() ==null)

                    <img id="showImage" src="{{ url('profile-images/no_image.jpg') }}" style="width: 150px; width: 150px; border: 1px solid #000000; border-radius:100px;">

                    @else

                    <img class="profile-user-img img-responsive img-circle" src="{{ asset('img/agclogo.png') }}" alt="User profile picture" height="100">
                    @endif

                  <h3 class="profile-username text-center">
                    <strong style="color:rgb(43, 18, 18); backgroud:white">
                    <span><i class="fa fa-email margin-r-5"></i> {{ Auth::user()->name }}</span > <br>
                    <span style="color:green; backgroud:white">Dashboard</span>
                  </strong>
                  </h3>
                <!-- /.box-body -->



                    <div class="list-group-item">
                        <strong style="color:red; backgroud:white"><i class="fa fa-dollar margin-r-5"></i> <span>
                            <b>Tithe Status</b> <br> Remark: <a class="pull-right"><span style="color:green; backgroud:white">Faithful</span></a>

                        </span ></strong>

                    </div>

              </div>
              <div class="box box-danger"></div>
              </div>
              <!-- /.box -->

        </div>
        <div class="col-sm-8">
        <div class="box box-primary">
        <div class="box-body box-profile">
      <div class="table-responsive">
        <table class="table no-margin">

                              <tbody>
                                {{-- @foreach ($profile as $profile) --}}
{{-- @if (!$profile) --}}

<tr>
    <th width="30%"></th>
    <td>
                                    {{-- <img class="profile-user-img img-responsive img-circle" src="{{ Storage::url($profile->picture) }}" alt="User profile picture" height="20"> --}}
                                    {{-- <img src="{{ Storage::url($user->profile->picture) }}" alt="user image" class="img-radius img-40 align-top m-r-15"> --}}

                                    </td>
                              </tr>
                              <tr>
                                  <th width="30%">Membership ID</th>
                                  <td>

                                      {{-- {{ Str::ucfirst(auth()->user()->profile->membership_id) }} --}}
                                       {{-- {{ Str::ucfirst($profile->role_name) }}  --}}
                                    </td>
                                </tr>
                              <tr>
                                <th width="30%">Full Name</th>
                                <td>
                                    {{ Str::ucfirst(Auth::user()->first_name) }} &nbsp;
                                 </td>
                              </tr>
                              <tr>
                                <th width="30%">Email</th>
                                <td>{{ Auth::user()->email }}</td>
                            </tr>
                              <tr>
                                  <th width="30%">Gender</th>
                                  <td>
                                      {{-- {{ Str::ucfirst(Auth::user()->profile->gender) }} --}}
                                </td>
                                </tr>
                            <tr>
                                <th width="30%">Phone No</th>
                                <td>{{ Str::ucfirst(Auth::user()->phone) }} </td>
                              </tr>
                              {{-- @endforeach --}}
                              {{-- @endif --}}
                            </tbody>
                        </table>
                        @if (Auth::user()->profile->id ?? '')

                        <a href="{{ route('profile.detail', auth()->user()->profile->id) ?? '' }}" class="btn btn-block " style="background-color: #f82249; color: #fffff1"><b>View all/Update record</b></a>
                        @else
                        <span class="badge badge-success bg-danger badge-pill" style="color:fff; padding:5px;  font-size:12px; background:#b9b1b3; ">
                            Incomplet Registration...
                            please update your profile
                            <a href="{{ route('profile.create') }}" class="btn btn-block " style="color: #f82249; font-style: italic;">click Here</a>
                            </span>
                        @endif

                          </div>
                        </div>
                        </div>
                        <div class="box box-danger"></div>
                    </div>

            </div>
          </div>













    </div>
    </div>
    </div>



      </div>
      <!-- /.table-responsive -->
    </div>
    </div>
    </div>


      </section>
      <!-- /.content -->
{{-- </div> --}}

@endsection


