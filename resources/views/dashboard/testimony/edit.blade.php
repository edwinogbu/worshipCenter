@extends('layouts.mainApp')


@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">


    <div class="card-body">
{{-- <div class="content-wrapper" style="min-height: 1126px;"> --}}
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>

        </h1>

      </section>

      <!-- Main content -->
      <section class="content">

        <div class="row">
          <div class="col-md-4">

            <!-- Profile Image -->
            <div class="box box-primary">
              <div class="box-body box-profile">
                {{-- @if (auth()->user()->picture ==null)

                  <img id="showImage" src="{{ url('profile-images/no_image.jpg') }}" style="width: 50px; width: 50px; border: 1px solid #000000; border-radius:50px;">

                  @else

                  <img class="profile-user-img img-responsive img-circle" src="{{ asset('img/agclogo.png') }}" alt="User profile picture" height="100">
                  @endif --}}

                {{-- <h3 class="profile-username text-center">{{ Auth::user()->email }}</h3>
                <h3 class="profile-username text-center">{{ auth()->user()->id  }}</h3>
                <strong style="color:red; backgroud:white"><i class="fa fa-user margin-r-5"></i> <span> {{ Auth::user()->email }}'s Profile:</span ><span style="color:green; backgroud:white">Online</span></strong> --}}
              <!-- /.box-body -->
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
        <span class="description">july 18 - 7:30 PM today</span>
      </div>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body box-profile box-body mx-4">

        <form method="POST" action="{{ route('user.testimony.update', $testimony->id) }}" class="box-body box-profile mx-5"  enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group row">

                <div class="col-md-6">
                    <label for="testifier_name" class="col-form-label text-md-right">{{ __('testifier_name') }}</label>

                    <input id="testifier_name" type="text" class="form-control @error('testifier_name') is-invalid @enderror" name="testifier_name" value="{{ $testimony->testifier_name }}" required autocomplete="testifier_name" autofocus>

                    @error('testifier_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="title" class="col-form-label text-md-right">{{ __('title') }}</label>

                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $testimony->title }}" required autocomplete="title" autofocus>

                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

            </div>

                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="body" class="col-form-label text-md-right">{{ __('Body') }}</label>

                            <textarea  id="body" type="text" class="form-control @error('body') is-invalid @enderror" name="body" cols="10" rows="4">
                            {{ $testimony->body }}
                            </textarea>
                            @error('body')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                </div>


            <div class="form-group row">

                <div class="col-md-6">
                    <label for="picture" class="col-form-label text-md-right">{{ __('picture') }}</label>

                    <input id="picture" type="file" class="form-control" name="picture"  value="{{ $testimony->picture }}">

                    @error('picture')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="occupation" class="col-form-label text-md-right">{{ __('occupation') }}</label>

                    <input id="occupation" type="text" class="form-control @error('occupation') is-invalid @enderror" name="occupation" value="{{ $testimony->occupation }}" required autocomplete="occupation" autofocus>

                    @error('occupation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>


            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-lg pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-lg btn-danger pull-right" style="background-color: #f24; color:#fff; float:center">
                    {{ __('Update') }}
                </button>
            </div>
        </form>


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






