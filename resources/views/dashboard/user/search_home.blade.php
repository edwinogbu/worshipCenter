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

    </div>
    </div>
      <!-- /.content -->
{{-- </div> --}}

@endsection


