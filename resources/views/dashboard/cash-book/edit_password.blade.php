@extends('layouts.mainApp')

@section('content')
<div class="container">
    <div class="row justify-content-center">
              <!-- Main content -->
        <section class="content">
                <div class="row">
                            <div class="col-md-4">
                                <!-- Profile Image -->
                                <div class="box box-primary">
                                    <div class="box-body box-profile">
                                    </div>
                                    <div class="box box-danger"></div>
                                </div>
                                <!-- /.box -->

                                <!-- About Me Box -->
                                <div class="box box-primary">
                                        <img class="profile-user-img img-responsive img-circle" src="{{ asset('dist/img/credit/visa.png') }}" alt="User profile picture" height="100">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">About Me</h3>
                                        </div>
                                        <!-- /.box-header -->
                                        <div class="box-body">
                                                <strong><i class="fa fa-book margin-r-5"></i> Tithe Status</strong>
                                                <p class="text-muted">
                                                    Regular
                                                </p>
                                                <hr>
                                                <strong><i class="fa fa-map-marker margin-r-5"></i> Upcoming programs</strong>
                                                <p class="text-muted">
                                                    28 March 2022
                                                </p>
                                                <hr>
                                                <strong><i class="fa fa-pencil margin-r-5"></i> Lead Pastor</strong>
                                                <p >
                                                    <img style="float: left" src="{{ asset('img/pastor/pastor.jpg') }}" class="profile-user-img img-responsive img-circle"  alt="User profile picture"  width="50">
                                                </p>

                                                <hr>
                                                <br>
                                                <br>
                                                <br>
                                                <strong><i class="fa fa-file-text-o margin-r-5"></i> March prophecy</strong>

                                                <p>Your Bless</p>
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
                                        <a href="#">MembershipID: </a>
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
                            <div class="box-body box-profile box-body mx-4">
                                {!! Toastr::message() !!}
                                    <form action="{{ route('user.password.update' ) }}" method="post" enctype="multipart/form-data">

                                            @csrf
                                                    <div class="form-group has-success row">
                                                        <div class="col-sm-3">
                                                            <label class="col-form-label" for="inputSuccess1">
                                                                <h5>Current Password <span class="text-danger">*</span></h5>

                                                            </label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="controls">
                                                                <input type="text" name="oldpassword" id="current_password" class="form-control" value="{{ auth()->user()->password }}" >
                                                                @error('oldpassword')
                                                                <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="form-group has-success row">
                                                        <div class="col-sm-3">
                                                            <label class="col-form-label" for="inputSuccess1">
                                                                <h5>New Password <span class="text-danger">*</span></h5>

                                                            </label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="controls">
                                                                <input type="text" name="password" id="password" class="form-control"  >
                                                                @error('password')
                                                                <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group has-success row">
                                                        <div class="col-sm-3">
                                                            <label class="col-form-label" for="inputSuccess1">
                                                                <h5>Confirm Password  <span class="text-danger">*</span></h5>

                                                            </label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="controls">
                                                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" >
                                                                @error('password_confirmation')
                                                                <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="text-center m-r-20">
                                                        <button type="submit" class=" b-b-primary btn-success btn-round btn-lg btn-out">Change Password</button>
                                                    </div>

                                    </form>
                                    <div class="box box-danger"></div>
                            </div>
                        </div>
                    </div>

                </div>
        </section>


    </div>
</div>
@endsection
