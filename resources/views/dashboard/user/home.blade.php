@extends('layouts.mainApp')


@section('content')

<div class="container">
    <div class="row justify-content-center">
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

        <div class="row">
            <div class="col-sm-12">

                <div class="box box-primary">
                    <a style="display: inline; font-style: italic; margin:20px; " class="btn btn-success pull-right btn-round btn-out btn-md mr-3  p-5" href="http://127.0.0.1:8000/user/home"><span class="glyphicon glyphicon-pencil btn-round btn-out"></span>

                        User Home
                    </a>
                    <div class="box-body box-profile">
                        {{-- <div>
                        <div class="col-sm-4">
                                <div class="mx-auto pull-right">
                                    <div class="form-control">
                                        <form action="#" method="GET" role="search">

                                            <div class="input-group">
                                                <span class="input-group-btn mr-5 mt-1">
                                                    <button class="btn btn-info" type="submit" title="Search projects">
                                                        <span class="fas fa-search"></span>
                                                    </button>
                                                </span>
                                                <input type="text" class="form-control mr-2" name="q" placeholder="Search user" id="term">
                                                <a href="#" class=" mt-1">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-danger" type="button" title="Refresh page">
                                                            <span class="fas fa-sync-alt"></span>
                                                        </button>
                                                    </span>
                                                </a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <div class="col-sm-6 pull-center" style="color:#22aaf8; margin:0px; text-align:center;">
                            <div class="row" style="color:#22aaf8; margin:0px; text-align:center;">
                                <span style="color:#22aaf8; margin:0px; text-align:center;">Membership Verification</span>
                            </div>
                            <form action="{{ route('user.home') }}" method="get" class="sidebar-form " style="background-color: #ffffff;">
                                @csrf
                                {{-- <label for="membership_id" class="input-label" style="display: inline">Membership ID</label> --}}
                                <div class="input-group">
                                    <span class="input-group-btn">
                                            <a href="{{ route('user.home') }}" class=" mt-1">
                                            <button class="btn btn-danger btn-danger" type="button" title="Refresh page"  class="btn btn-lg btn-danger" style="background-color: red;">
                                                <span class="fas fa-sync-alt" style="color: #fffff1">Refresh</span>
                                            </button>
                                        </a>
                                        </span>
                                    <input type="text" name="q" class="form-control" placeholder="Search membership Record..." style="background-color: #ffffff;" >
                                    <span class="input-group-btn">
                                        <button type="submit" id="search-btn" class="btn btn-lg btn-danger" style="background-color: green;" title="Search Member">
                                            {{-- <i class="fa fa-user" style="color: #ffffff;" title="Search Member"></i> --}}
                                            <span class="fas fa-users" style="color: #fffff1" title="Search Members of MGM">Search</span>
                                            <i class="fa fa-search" style="color: #ffffff;" title="Search Member"></i>

                                        </button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                <div class="box box-danger"></div>
            </div>
        </div>



        <div class="clearfix visible-sm-block"></div>
    <div class="row">
        <div class="col-md-9 col-sm-9 col-xs-9">
            @if (isset($Members) !==null && $search !==null )
                <div class="box box-danger"  >
                    <div class="box-header with-border">
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>

                    {{-- @if ($Members->count() == 1) --}}

                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="col-md-4">
                                    <!-- Profile Image -->
                                <div class="box box-primary">
                                    {{-- <img class="justify-content-center rounded-circle" src="{{ asset('img/logo-mega-glory-full.png')}}" alt="" title="" height="70px" width="70px"> --}}

                                        <div class="box-header with-border">
                                            <h3 class="box-title">
                                                @if ($profile !=null)
                                                @foreach($Members as $Member)
                                                    <td>{{$Member->first_name . ' ' . $Member->sur_name }}
                                                    is  MGM Member
                                                @endforeach
                                                @endif

                                            </h3>
                                        </div>
                                        <div class="box-body">
                                            @if ($profile !=null)
                                            @foreach($Members as $Member)
                                                <table class="table">
                                                    <tr>
                                                        <td>
                                                            @if ($Member->profile !=null)

                                                                <img id="showImage" src="{{ Storage::url($Member->profile->picture) }}" style="width: 200px; height: 200px; border: 1px solid #000000; border-radius:100px;">

                                                                @else

                                                                <img id="showImage" src="{{ url('profile-images/no_image.jpg') }}" style="width: 100px; height: 100px; border: 1px solid #000000; border-radius:100px;">
                                                                @endif

                                                        </td>
                                                    </tr>

                                                </table>
                                                    <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>
                                                <p>
                                                        <span class="label label-danger"></span>
                                                        <span class="label label-success"></span>
                                                        {{-- @if ($Member->profile ) --}}

                                                        {{ !empty($Member->profile) ? $Member->profile->skill : 'Incomplete Registration...No profile data Found' }}

                                                        {{-- @endif --}}


                                                        <span class="label label-info"></span>
                                                        <span class="label label-warning"></span>
                                                </p>

                                                @endforeach
                                                @endif
                                        </div>
                                        <!-- /.box-body -->
                                        <div class="box box-success"></div>
                                        <div class="box box-primary"></div>

                                </div>
                                <!-- /.box -->
                            </div>

                            <div class="col-md-6">

                                <table class="table">
                                    @if ($profile !=null)
                                    @foreach($Members as $Member)
                                    <tr><th width="30%">
                                        <img class="justify-content-center rounded-circle" src="{{ asset('img/logo-mega-glory-full.png')}}" alt="" title="" height="100px" width="200px">

                                    </th><td></td></tr>
                                    <tr><th width="30%"></th><td></td></tr>

                                    <tr>
                                        <th width="30%">Date Joined: </th>
                                        <td> {{ !empty($Member->profile) ? Carbon\Carbon::parse($Member->profile->created_at)->isoFormat("MMM Do Y"):'No data uploaded yet profile' }}</td>
                                    </tr>
                                    <tr style=" margin-top: 40px;">
                                            <th width="30%">Name</th>
                                        <td>{{$Member->first_name . ' ' . $Member->sur_name }}
                                        </td>
                                    <tr>
                                        <th width="30%">Email</th>
                                        <td>{{$Member->email}}</td>
                                    </tr>
                                    <tr>
                                        <th width="30%">Phone</th>
                                        <td>{{$Member->phone}}</td>
                                    </tr>
                                    <tr>
                                        <th width="30%">Gender</th>
                                        <td> {{ !empty($Member->profile) ? Str::ucfirst($Member->profile->gender):'No data uploaded yet profile' }}</td>
                                    </tr>
                                    <tr>
                                        <td> {{ !empty($Member->profile) ? Str::ucfirst($Member->profile->state):'No data uploaded yet profile' }}</td>

                                    </tr>
                                </tr>
                                    @endforeach
                                    @endif
                                </table>
                                {{ $Members->links() }}
                            </div>

                        </div>

                        {{-- @else --}}
                        {{-- @if ($msg=Session::get('fail'))
                        <div class="alert alert-danger">{{ $msg }}</div>
                        @endif --}}
                    {{-- @endif --}}
                </div>
            @endif
        </div>
    </div>

<div class="col-md-12">
    <div class="card-body">
{{-- <div class="content-wrapper" style="min-height: 1126px;"> --}}
    <!-- Content Header (Page header) -->


      <!-- Main content -->
      <section class="content">

                <div class="row">
                    <div class="col-md-4">

                        <!-- Profile Image -->
                        <div class="box box-primary">
                            <div class="user-block">
                                <img class="profile-user-img img-responsive img-circle" src="{{ asset('img/logo-mega-glory-full.png') }}" alt="User profile picture" height="100">
                            </div>
                            <div class="box-body box-profile text-center">
                                <section class="content-header">
                                    <h1 style="font-weight: 900;">
                                        <th style="font-weight: 900;">

                                            {{ Auth::user()->first_name }}
                                        </th>
                                    </h1>

                                  </section>
                                  <th >
                                      <h4 style="font-weight: 900;">M.G.M. Lagos Nigeria </h4>
                                  </th>
                                @if (auth()->user()->profile !=null)
                                {{-- <img class="justify-content-center rounded-circle" src="{{ asset('img/logo-mega-glory-full.png')}}" alt="" title="" height="70px" width="70px"> --}}

                                <img id="showImage" src="{{ Storage::url(Auth::user()->profile->picture) }}" style="width: 150px; width: 150px; border: 1px solid #000000; border-radius:100px;">
                                {{-- <img id="showImage" src="{{ url('profile-images/no_image.jpg') }}" style="width: 50px; width: 50px; border: 1px solid #000000; border-radius:50px;"> --}}

                                @else

                                <img class="profile-user-img img-responsive img-circle" src="{{ asset('img/logo-mega-glory-full.png') }}" alt="User profile picture" height="100">
                                @endif

                            {{-- <h3 class="profile-username text-center">{{ Auth::user()->email }}</h3> --}}
                            {{-- <h3 class="profile-username text-center">{{ auth()->user()->role_name }}</h3> --}}
                            <h5>

                                <strong style="color:green; backgroud:white"><i class="fa fa-user margin-r-5"></i> <span> {{ Auth::user()->first_name }} is:</span ><span style="color:green; backgroud:white">Online</span></strong>
                            </h5>
                            <!-- /.box-body -->
                        </div>
                        <div class="box box-danger"></div>
                        </div>
                        <!-- /.box -->
                        <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title">About Me</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                                <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

                                                <p class="text-muted">
                                                    @if (auth()->user()->profile)
                                                    {{ !empty(auth()->user()->profile) ? Str::ucfirst(Auth::user()->profile->qualification):'No data pls update profile' }}

                                                    @else
                                                    <span class="username">
                                                        <a href="{{ route('profile.create') }}">
                                                            {{ !empty(auth()->user()->profile) ? Str::ucfirst(Auth::user()->profile->qualification):'No data pls update profile' }}
                                                        </a>
                                                    </span>

                                                    @endif

                                                </p>

                                                <hr>

                                                <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

                                                <p class="text-muted">
                                                    @if (auth()->user()->profile)
                                                    {{ !empty(auth()->user()->profile) ? Str::ucfirst(Auth::user()->profile->address):'No data pls update profile' }}

                                                    @else
                                                    <span class="username">
                                                        <a href="{{ route('profile.create') }}">
                                                            {{ !empty(auth()->user()->profile) ? Str::ucfirst(Auth::user()->profile->address):'No data pls update profile' }}
                                                        </a>
                                                    </span>

                                                    @endif

                                                </p>

                                                <hr>

                                                <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

                                                <p>
                                                <span class="label label-danger"></span>
                                                <span class="label label-success"></span>
                                                @if (auth()->user()->profile )

                                                {{ !empty(auth()->user()->profile) ? Str::ucfirst(Auth::user()->profile->skill):'No data pls update profile' }}
                                                @else

                                                <span class="username">
                                                    <a href="{{ route('profile.create') }}">
                                                        {{ !empty(auth()->user()->profile) ? Str::ucfirst(Auth::user()->profile->skill):'No data pls update profile' }}
                                                    </a>
                                                </span>
                                                @endif


                                                <span class="label label-info"></span>
                                                <span class="label label-warning"></span>
                                                </p>

                                                <hr>

                                                <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

                                                <p>yet to come!.. prophet not </p>
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
                                        <img class="justify-content-center rounded-circle" src="{{ asset('img/logo-mega-glory-crest.png')}}" alt="" title="" height="20px" width="20px">
                                                @if (auth()->user()->profile )
                                                    <span class="username">

                                                        <a href="#">Position:
                                                        {{ !empty(auth()->user()->profile) ? Str::ucfirst(Auth::user()->profile->position):'No data pls update profile' }}
                                                    </a>
                                                    </span>
                                                @else
                                                <span class="username">
                                                        <a href="{{ route('profile.create') }}">Position:
                                                            {{ !empty(auth()->user()->profile) ? Str::ucfirst(Auth::user()->profile->position):'No data pls update profile' }}
                                                        </a>
                                                    </span>

                                                @endif

                                                @if (auth()->user()->profile ==null)
                                                <span class="username">

                                                    <a href="{{ route('profile.create') }}">since:
                                                        {{ !empty(auth()->user()->profile) ? Carbon\Carbon::parse(Auth::user()->profile->created_at)->isoFormat('MMM Do YYYY') :'No data pls update profile' }}
                                                    </a>
                                                </span>
                                                @else
                                                <a href="#">since:
                                                    {{ !empty(auth()->user()->profile) ? Str::ucfirst( Carbon\Carbon::parse(auth()->user()->profile->created_at)->isoFormat('MMM Do Y') ):'No data pls update profile' }}
                                                </a>

                                                @endif

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
                                                    @if (Auth::user()->profile !=null)

                                                    {{-- <img class="profile-user-img img-responsive img-circle" src="{{ asset('img/agclogo.png') }}" alt="User profile picture" height="100"> --}}
                                                        <img id="showImage" src="{{ Storage::url(Auth::user()->profile->picture) }}" style="width: 200px; height: 200px; border: 1px solid #000000; border-radius:100px;">

                                                        @else

                                                        <img id="showImage" src="{{ url('profile-images/no_image.jpg') }}" style="width: 150px; height: 150px; border: 1px solid #000000; border-radius:100px;">
                                                        @endif

                                                        <h3 class="profile-username text-center">
                                                            <strong style="color:rgb(43, 18, 18); backgroud:white">
                                                            <span><i class="fa fa-email margin-r-5"></i> {{ Auth::user()->name }}</span > <br>
                                                            <span style="color:green; backgroud:white">Dashboard</span>
                                                        </strong>
                                                        </h3>
                                                    <!-- /.box-body -->
                                                        <div class="list-group-item">
                                                            <strong style="color:red; backgroud:white">
                                                                {{-- <i class="fa fa-dollar margin-r-5"></i>  --}}
                                                                <span>
                                                                <b>Last Tithe Payment Status</b> :<br>
                                                                    {{-- <span style="color:green; backgroud:white">{{ Carbon\Carbon::parse(auth()->user()->created_at)->isoFormat('MMM Do Y') }}</span> --}}
                                                                </span >
                                                            </strong>

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

                                                                            <tr>
                                                                                <th width="30%"></th>
                                                                                <td>
                                                                                {{-- <img class="profile-user-img img-responsive img-circle" src="{{ Storage::url($profile->picture) }}" alt="User profile picture" height="20"> --}}
                                                                                {{-- <img src="{{ Storage::url($user->profile->picture) }}" alt="user image" class="img-radius img-40 align-top m-r-15"> --}}

                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th width="40%">Membership ID</th>
                                                                                <td>
                                                                                    {{ Auth::user()->membership_id }}
                                                                                </td>
                                                                            </tr>
                                                                        <tr>
                                                                            <th width="30%">Full Name</th>
                                                                            <td>
                                                                                {{ Str::ucfirst(Auth::user()->first_name) . ' ' . Auth::user()->sur_name }} &nbsp;
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th width="30%">Email</th>
                                                                            <td>{{ Auth::user()->email }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th width="30%">Gender</th>
                                                                            <td>
                                                                                @if (auth()->user()->profile !=null)

                                                                                    {{ !empty(auth()->user()->profile) ? Str::ucfirst(Auth::user()->profile->gender):'No data pls update profile' }}

                                                                                @else
                                                                                <span class="username">

                                                                                    <a href="{{ route('profile.create') }}">
                                                                                            {{ !empty(auth()->user()->profile) ? Str::ucfirst(Auth::user()->profile->gender):'No data pls update profile' }}
                                                                                        </a>
                                                                                    </span>

                                                                                @endif

                                                                                <span class="username">
                                                                                    <a href="{{ route('profile.create') }}">
                                                                                    </a>
                                                                                </span>

                                                                            </td>
                                                                            </tr>
                                                                        <tr>
                                                                            <th width="30%">Phone No</th>
                                                                            <td>{{ Str::ucfirst(Auth::user()->phone) }} </td>
                                                                        </tr>

                                                                        </tbody>
                                                        </table>

                                                        @if (Auth::user()->profile !=null)
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


