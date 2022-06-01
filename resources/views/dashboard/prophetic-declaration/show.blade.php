@extends('layouts.mainApp')


@section('content')

<div class="box box-primary p-5">
    <div class="box-header with-border p-5">
        <h2 class="box-title"><span style="color:green; backgroud:white"> Profile Details Dashboard</span></h2>
    </div>

    <h3 class="profile-username text-center"><span style="color:green; backgroud:white">{{ Auth::user()->email }}</span></h3>
    <h3 class="profile-username text-center"><span style="color:green; backgroud:white; font-style:italic">{{ auth()->user()->first_name .' '.auth()->user()->sur_name }}</span></h3>
    <strong style="color:red; backgroud:white"><i class="fa fa-user margin-r-5"></i> <span> {{ Auth::user()->email }}'s Profile:</span ><span style="color:green; backgroud:white">Online</span></strong>

</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">


    <div class="card-body">

      <!-- Main content -->
      <section class="content">

    <div class="row">
        <div class="col-md-3">
            <!-- Profile Image -->
            <div class="box box-primary">
                    <div class="box-body box-profile">

                    </div>
                <div class="box box-danger"></div>
            </div>
            <!-- /.box -->

            <!-- About Me Box -->
            <div class="box box-primary">
                <div class="box">
                    <!-- Profile Image -->
                        <div class="box-body box-profile">
                        {{-- @if ($profile->picture ==null) --}}

                            <img id="showImage" src="{{ url('profile-images/no_image.jpg') }}" style="width: 150px; width: 150px; border: 1px solid #000000; border-radius:100px;">

                            {{-- @else --}}
                            {{-- <img src="{{ Storage::url($post->picture) }}" alt="user image" class="img-radius img-40 align-top m-r-15"> --}}

                            {{-- <img class="profile-user-img img-responsive img-circle" src="{{ Storage::url($profile->picture) }}" alt="User profile picture" height="100"> --}}
                            {{-- @endif --}}
                        <!-- Tithe Remark -->
                            <div class="list-group-item">
                                <strong style="color:red; backgroud:white"><i class="fa fa-dollar margin-r-5"></i> <span>
                                    <b>Tithe Status</b> <br> Remark: <a class="pull-right">
                                    <span style="color:green; backgroud:white">Faithful</span></a>
                                   </span >
                                </strong>
                            </div>
                        </div>
                       <div class="box box-danger"></div>
                {{-- </div> --}}
                    <!-- /.box -->
            </div>
                    <div class="box-header with-border">
                        <h3 class="box-title">About Me</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

                        <p class="text-muted">
                            {{ auth()->user()->first_name }}
                        </p>

                        <hr>

                        <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

                        <p class="text-muted">{{ auth()->user()->sur_name }}</p>

                        <hr>

                        <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

                        <p>
                        <span class="label label-danger">{{ auth()->user()->phone }}</span>
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

        <div class="col-md-9 col-sm-9 col-xs-9">
            <div class="box box-danger"  >
                <div class="box-header with-border">
                    <div class="user-block">
                        <img class="justify-content-center rounded-circle" src="{{ asset('img/agclogo.png')}}" alt="" title="" height="20px" width="20px">
                        <span class="username">
                            <a href="#">Leadership Postion:-</a>

                            </span>
                        <span class="description">
                            <span class="date">{{ Carbon\Carbon::parse(auth()->user()->created_at)->isoFormat('MMM Do YYYY') }}</span>

                        </span>
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


                        <div class="col-sm-12">
                            <div class="box box-primary">
                                <div class="box-body box-profile">
                                    <div class="table-responsive">
                                        <table class="table no-margin">
                                            <tbody>
                                                {{-- @foreach ($profile as $profile) --}}


                                                        <tr>
                                                            <th width="30%">Role Name</th>
                                                            <td>{{ auth()->user()->role_name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th width="30%">Membership ID</th>
                                                            {{-- <td>{{ Str::ucfirst($profile->membership_id) }}  {{ Str::ucfirst(Auth::user()->sur_name) }}</td> --}}
                                                        </tr>
                                                        <tr>
                                                            <th width="30%">Full Name</th>
                                                            <td>{{ Str::ucfirst(auth()->user()->first_name) }} &nbsp; {{ Str::ucfirst(auth()->user()->sur_name) }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th width="30%">Email</th>
                                                            <td>{{ Auth::user()->email }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th width="30%">Gender</th>
                                                            <td>{{ auth()->user()->gender }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th width="30%">Phone No</th>
                                                            <td>{{ auth()->user()->phone }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th width="30%">Address</th>
                                                            <td>
                                                                {{-- {{ $profile->address }} --}}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th width="30%">Qualification</th>
                                                            <td>
                                                                {{-- {{ $profile->qualification }} --}}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th width="30%">Occupation</th>
                                                            <td>
                                                                {{-- {{ $profile->occupation }} --}}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th width="30%">Position</th>
                                                            <td>
                                                                {{ Auth::user()->profile->position }}
                                                            </td>
                                                        </tr>
                                                {{-- @endforeach --}}

                                            </tbody>
                                        </table>
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




</section>

      </div>
      <!-- /.table-responsive -->
    </div>
    </div>
    </div>
      <!-- /.content -->
{{-- </div> --}}

@endsection


