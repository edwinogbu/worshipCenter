@extends('layouts.mainApp')


@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="box box-primary p-5">
                <div class="box-header with-border p-5">

                        <a style="display: inline; font-style: italic; margin:20px; " class="btn btn-primary pull-left btn-round btn-out btn-md mr-3  p-5" href="{{ route('user.home') }}"><span class="glyphicon glyphicon-pencil btn-round btn-out"></span>

                            User Home</span>
                        </a>
                    <a style="background-color: #f82249; color: #FFFFFF display: inline; font-style: italic; margin:20px;" class="btn btn-primary pull-right btn-round btn-out btn-lg btn btn-lg bg-primary mx-5" href="{{ route('profile.index') }}"><span class="glyphicon glyphicon-pencil btn-round btn-out"></span>

                        User Profile</span>
                    </a>

                    <h3 class="profile-username text-center"><span style="color:green; backgroud:white">

                        <h2 class="box-title"><span style="color:green; backgroud:white">
                            {{ Auth::user()->first_name }} Profile Detail</span></h2>        </span></h3>
                </div>
                {{-- <h3 class="profile-username text-center"><span style="color:green; backgroud:white; font-style:italic">{{ auth()->user()->first_name .' '.auth()->user()->sur_name }}</span></h3> --}}
                <strong style="color:red; backgroud:white"><i class="fa fa-user margin-r-5"></i> <span> {{ Auth::user()->first_name }} is : </span ><span style="color:green; backgroud:white">Online</span></strong>

            </div>

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
                @if ($profile->picture ==null)

                  <img id="showImage" src="{{ url('profile-images/no_image.jpg') }}" style="width: 50px; width: 50px; border: 1px solid #000000; border-radius:50px;">

                  @else

                  <img class="profile-user-img img-responsive img-circle" src="{{  Storage::url($profile->picture) }}" alt="User profile picture" height="100">
                  @endif

                <h3 class="profile-username text-center">{{ Auth::user()->email }}</h3>
                <h3 class="profile-username text-center">{{ auth()->user()->id  }}</h3>
                <strong style="color:red; backgroud:white"><i class="fa fa-user margin-r-5"></i> <span> {{ Auth::user()->email }}'s Profile:</span ><span style="color:green; backgroud:white">Online</span></strong>
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
{{--
        <form method="POST" action="{{ route('profile.update', $profile->id) }}" class="box-body box-profile mx-5"  enctype="multipart/form-data">


            @csrf

            <div class="form-group row">

                <div class="col-md-6">
                    <label for="gender" class="col-form-label text-md-right">{{ __('gender') }}</label>
                    <select name="gender" id="" type="text" class="form-control @error('gender') is-invalid @enderror"  value="{{ $profile->gender }}" >
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>

                    @error('gender')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <div class="col-md-6">
                    <label for="Address" class="col-form-label text-md-right">{{ __('Address') }}</label>

                    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $profile->address }}" required autocomplete="address" autofocus>

                    @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


            </div>

                <div class="form-group row">

                    <div class="col-md-6">
                        <label for="qualification" class="col-form-label text-md-right">{{ __('Qualification') }}</label>

                        <input id="qualification" type="text" class="form-control @error('qualification') is-invalid @enderror" name="qualification" value="{{ $profile->qualification }}" required autocomplete="qualification" autofocus>

                        @error('qualification')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                    <div class="col-md-6">
                        <label for="occupation" class="col-form-label text-md-right">{{ __('occupation') }}</label>

                        <input id="occupation" type="text" class="form-control @error('occupation') is-invalid @enderror" name="occupation" value="{{ $profile->occupation }}" required autocomplete="occupation" autofocus>

                        @error('occupation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                </div>


            <div class="form-group row">

                <div class="col-md-6">
                    <label for="dob" class="col-form-label text-md-right">{{ __('Date of Birth') }}</label>

                    <input id="dob" type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ $profile->dob }}" required autocomplete="dob" autofocus>

                    @error('dob')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <div class="col-md-6">
                    <label for="membership_status" class="col-form-label text-md-right">{{ __('Membership Status') }}</label>
                    <select name="membership_status" id="" type="text" class="form-control @error('membership_status') is-invalid @enderror" value="{{ $profile->membership_status }}" >
                        <option value="">select.. </option>
                        <option value="unbaptise">Unbaptise </option>
                        <option value="baptise">baptise </option>
                        <option value="full member">full member </option>

                    </select>
                    @error('membership_status')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


            </div>


            <div class="form-group row">

                <div class="col-md-6">
                    <label for="state_origin" class="col-form-label text-md-right">{{ __('State Origin') }}</label>

                    <input id="state_origin" type="text" class="form-control @error('state_origin') is-invalid @enderror" name="state_origin" value="{{ $profile->state_origin }}" required autocomplete="state_origin" autofocus>

                    @error('state_origin')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <div class="col-md-6">
                    <label for="lga" class="col-form-label text-md-right">{{ __('Local Govt.') }}</label>

                    <input id="lga" type="text" class="form-control @error('lga') is-invalid @enderror" name="lga" value="{{ $profile->lga }}" required autocomplete="lga" autofocus>

                    @error('lga')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

            </div>


            <div class="form-group row">


                <div class="col-md-6">
                    <label for="skill" class="col-form-label text-md-right">{{ __('Skill') }}</label>

                        <textarea  id="skill" type="text" class="form-control @error('skill') is-invalid @enderror" name="skill" value="{{ $profile->skill }}" cols="10" rows="4">
                        </textarea>
                        @error('skill')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <div class="col-md-6">
                    <label for="marital_status" class="col-form-label text-md-right">{{ __('Marital Status') }}</label>

                    <select name="marital_status" id="" type="text" class="form-control @error('marital_status') is-invalid @enderror" value="{{ $profile->martal_status }}" >
                        <option value="">select.. </option>
                        <option value="single">single </option>
                        <option value="married">married </option>
                        <option value="divorced">divorced </option>
                        <option value="widow">widow </option>
                        <option value="widower">widower </option>


                    </select>
                    @error('marital_status')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


            </div>


            <div class="form-group row">

                <div class="col-md-6">
                    <label for="picture" class="col-form-label text-md-right">{{ __('picture') }}</label>

                    <input id="picture" type="file" class="form-control" name="picture"  value="{{  $profile->picture }}">

                    @error('picture')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="position" class="col-form-label text-md-right">{{ __('Position') }}</label>
                    <select name="position" id="" type="text" class="form-control @error('position') is-invalid @enderror" value="{{  $profile->position }}" >
                        <option value="pastor">pastor</option>
                        <option value="asst_pastor">asst pastor</option>
                        <option value="dept_leader">dept leader</option>
                        <option value="member">member</option>

                    </select>
                    {{-- <input id="position" type="text" class="form-control @error('position') is-invalid @enderror" name="position" value="{{ old('position') }}" required autocomplete="position" autofocus> --}}

                    {{-- @error('position')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

            </div>


            <div class="form-group row mb-0 text-center">
                <div class="col text-center"> --}}
                    {{-- <a href="#" class="btn btn-primary btn-block"><b>update Photo</b></a> --}}

                    {{-- <button type="submit" class="btn btn-lg btn-danger" style="background-color: #f24; color:#fff; float:center">
                        {{ __('Register') }}
                    </button>
                </div>
            </div>
        </form> --}}
        <form method="POST" action="{{ route('profile.update', $profile->id) }}" class="box-body box-profile mx-5"  enctype="multipart/form-data">


            @csrf

            <div class="form-group row">

                <div class="col-md-6">
                    <label for="gender" class="col-form-label text-md-right">{{ __('gender') }}</label>
                    <select name="gender" id="" type="text" class="form-control @error('gender') is-invalid @enderror"  value="{{$profile->gender  }}" >
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>

                    @error('gender')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <div class="col-md-6">
                    <label for="Address" class="col-form-label text-md-right">{{ __('Address') }}</label>

                    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $profile->address }}" required autocomplete="address" autofocus>

                    @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


            </div>

                <div class="form-group row">

                    <div class="col-md-6">
                        <label for="qualification" class="col-form-label text-md-right">{{ __('Qualification') }}</label>

                        <input id="qualification" type="text" class="form-control @error('qualification') is-invalid @enderror" name="qualification" value="{{ $profile->qualification }}" required autocomplete="qualification" autofocus>

                        @error('qualification')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                    <div class="col-md-6">
                        <label for="occupation" class="col-form-label text-md-right">{{ __('occupation') }}</label>

                        <input id="occupation" type="text" class="form-control @error('occupation') is-invalid @enderror" name="occupation" value="{{ $profile->occupation }}" required autocomplete="occupation" autofocus>

                        @error('occupation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                </div>


            <div class="form-group row">

                <div class="col-md-6">
                    <label for="dob" class="col-form-label text-md-right">{{ __('Date of Birth') }}</label>

                    <input id="dob" type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ $profile->dob }}" required autocomplete="dob" autofocus>

                    @error('dob')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <div class="col-md-6">
                    <label for="membership_status" class="col-form-label text-md-right">{{ __('Membership Status') }}</label>
                    <select name="membership_status" id="" type="text" class="form-control @error('membership_status') is-invalid @enderror" value="{{ $profile->membership_status }}" >
                        <option value="{{ $profile->membership_status }}">{{ $profile->membership_status }} </option>
                        <option value="unbaptise">Unbaptise </option>
                        <option value="baptise">baptise </option>
                        <option value="full member">full member </option>

                    </select>
                    @error('membership_status')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


            </div>
            <div class="form-group row">

                <div class="col-md-6">
                    <label for="date_joined" class="col-form-label text-md-right">{{ __('Date You Joined MGM') }}</label>

                    <input id="date_joined" type="date" class="form-control @error('date_joined') is-invalid @enderror" name="date_joined" value="{{ $profile->date_joined }}" required autocomplete="date_joined" autofocus>

                    @error('date_joined')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="nationality" class="col-form-label text-md-right">{{ __('nationality') }}</label>

                    <input id="nationality" type="text" class="form-control @error('nationality') is-invalid @enderror" name="nationality" value="{{ $profile->nationality }}" required autocomplete="nationality" autofocus>

                    @error('nationality')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>



            </div>


            <div class="form-group row">

                <div class="col-md-6">
                    <label for="state_origin" class="col-form-label text-md-right">{{ __('State Origin') }}</label>

                    <input id="state_origin" type="text" class="form-control @error('state_origin') is-invalid @enderror" name="state_origin" value="{{ $profile->state_origin }}" required autocomplete="state_origin" autofocus>

                    @error('state_origin')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <div class="col-md-6">
                    <label for="lga" class="col-form-label text-md-right">{{ __('Local Govt.') }}</label>

                    <input id="lga" type="text" class="form-control @error('lga') is-invalid @enderror" name="lga" value="{{ $profile->lga }}" required autocomplete="lga" autofocus>

                    @error('lga')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

            </div>


            <div class="form-group row">


                <div class="col-md-6">
                    <label for="skill" class="col-form-label text-md-right">{{ __('Skill') }}</label>

                        <textarea  id="skill" type="text" class="form-control @error('skill') is-invalid @enderror" name="skill" value="{{ $profile->skill }}" cols="10" rows="4">
                               {{ $profile->skill  }}
                        </textarea>
                        @error('skill')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <div class="col-md-6">
                    <label for="marital_status" class="col-form-label text-md-right">{{ __('Marital Status') }}</label>

                    <select name="marital_status" id="" type="text" class="form-control @error('marital_status') is-invalid @enderror" value="{{ $profile->martal_status }}" >
                        <option value="{{ $profile->marital_status }}">{{ $profile->marital_status }} </option>
                        <option value="single">single </option>
                        <option value="married">married </option>
                        <option value="divorced">divorced </option>
                        <option value="widow">widow </option>
                        <option value="widower">widower </option>


                    </select>
                    @error('marital_status')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


            </div>


            <div class="form-group row">

                <div class="col-md-6">
                    <label for="picture" class="col-form-label text-md-right">{{ __('picture') }}</label>

                    <input id="picture" type="file" class="form-control" name="picture"  >

                    @error('picture')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="position" class="col-form-label text-md-right">{{ __('Position') }}</label>
                    <select name="position" id="" type="text" class="form-control @error('position') is-invalid @enderror" value="{{ $profile->position }}" >
                        <option value="{{ $profile->pastor }}">{{ $profile->pastor }}</option>
                        <option value="pastor">pastor</option>
                        <option value="asst_pastor">asst pastor</option>
                        <option value="dept_leader">dept leader</option>
                        <option value="member">member</option>

                    </select>
                    {{-- <input id="position" type="text" class="form-control @error('position') is-invalid @enderror" name="position" value="{{ old('position') }}" required autocomplete="position" autofocus> --}}

                    @error('position')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

            </div>


            <div class="form-group row mb-0 text-center">
                <div class="col text-center">
                    {{-- <a href="#" class="btn btn-primary btn-block"><b>update Photo</b></a> --}}

                    <button type="submit" class="btn btn-lg btn-danger" style="background-color: #f24; color:#fff; float:center">
                        {{ __('Update') }}
                    </button>
                </div>
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






