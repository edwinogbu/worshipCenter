@extends('layouts.mainApp')


@section('content')

<div class="container">
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
    <div class="justify-content-center ml-5" style="align-content: center; margin-left: 60px;">
    {{-- <div class="row justify-content-center" style="align-content: center;"> --}}


      <!-- Main content -->
      <section class="content" style="align-content: center;">
        {{-- <div class="box box-header with-border box-success">
            <h1 style="text-align: center;">
                <span class="username ml-5" style=" text-align:center;">
                    <a href="#"  style="text-align: center;">

                        Creat New User Profile

                         </a>

                    </span>
            </h1>
        </div> --}}
        <div class="row" style="align-content: center;">
            <!-- TABLE: LATEST ORDERS -->
            <div class="clearfix visible-sm-block"></div>
            <div class="col-md-11-offset-1 col-sm-11-offset-1 col-xs-11 " style="align-content: center;">
                    <div class="box box-danger"  >
                            <div class="box-header with-border">
                                <div class="user-block">
                                    <img class="justify-content-center rounded-circle" src="{{ asset('img/logo-mega-glory-crest.png')}}" alt="" title="" height="20px" width="20px">
                                    <span class="username">
                                        <a href="{{ route('user.home') }}">{{ auth()->user()->membership_id }} </a>

                                        </span>
                                    <span class="description">{{ Carbon\Carbon::now()->toTimeString() }} </span>
                                </div>
                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                                                @if ($msg=Session::get('success'))
                                                <div class="alert alert-success">{{ $msg }}</div>
                                                @endif

                                                @if ($msg=Session::get('fail'))
                                                <div class="alert alert-danger">{{ $msg }}</div>
                                                @endif
                            <!-- /.box-header -->
                            <div class="box-body box-profile box-body mx-5 py-4">
                                <form method="POST" action="{{ route('profile.store') }}" class="box-body box-profile mx-5"  enctype="multipart/form-data">


                                                @csrf

                                                <div class="form-group row">

                                                    <div class="col-md-6">
                                                        <label for="gender" class="col-form-label text-md-right">{{ __('gender') }}</label>
                                                        <select name="gender" id="" type="text" class="form-control @error('gender') is-invalid @enderror"  value="{{ old('gender') }}" >
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
                                                        <textarea name="skill" style="background-color: white;" class="form-control input-sm p-4 m-5 " rows="2" placeholder="how can we find on your home ..."></textarea>

                                                        {{-- <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus> --}}

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

                                                            <input id="qualification" type="text" class="form-control @error('qualification') is-invalid @enderror" name="qualification" value="{{ old('qualification') }}" required autocomplete="qualification" autofocus>

                                                            @error('qualification')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>


                                                        <div class="col-md-6">
                                                            <label for="occupation" class="col-form-label text-md-right">{{ __('occupation') }}</label>

                                                            <input id="occupation" type="text" class="form-control @error('occupation') is-invalid @enderror" name="occupation" value="{{ old('occupation') }}" required autocomplete="occupation" autofocus>

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

                                                        <input id="dob" type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ old('dob') }}" required autocomplete="dob" autofocus>

                                                        @error('dob')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label for="membership_status" class="col-form-label text-md-right">{{ __('membership_status') }}</label>
                                                        <select name="membership_status" id="" type="text" class="form-control @error('membership_status') is-invalid @enderror"  value="{{ old('membership_status') }}" >
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
                                                        <label for="date_joined" class="col-form-label text-md-right">{{ __('Date You Joined MGM') }}</label>

                                                        <input id="date_joined" type="date" class="form-control @error('date_joined') is-invalid @enderror" name="date_joined" value="{{ old('date_joined') }}" required autocomplete="date_joined" autofocus>

                                                        @error('date_joined')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label for="nationality" class="col-form-label text-md-right">{{ __('nationality') }}</label>

                                                        <input id="nationality" type="text" class="form-control @error('nationality') is-invalid @enderror" name="nationality" value="{{ old('nationality') }}" required autocomplete="nationality" autofocus>

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

                                                        <input id="state_origin" type="text" class="form-control @error('state_origin') is-invalid @enderror" name="state_origin" value="{{ old('state_origin') }}" required autocomplete="state_origin" autofocus>

                                                        @error('state_origin')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>


                                                    <div class="col-md-6">
                                                        <label for="lga" class="col-form-label text-md-right">{{ __('Local Govt.') }}</label>

                                                        <input id="lga" type="text" class="form-control @error('lga') is-invalid @enderror" name="lga" value="{{ old('lga') }}" required autocomplete="lga" autofocus>

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
                                                        <textarea name="skill" style="background-color: white;" class="form-control input-sm p-4 m-5 " rows="4" placeholder="what's on your skill ..."></textarea>

                                                            {{-- <textarea  id="skill" type="text" class="form-control @error('skill') is-invalid @enderror" name="skill" value="{{ old('skill') }}" cols="10" rows="4">
                                                            </textarea> --}}
                                                            @error('skill')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>


                                                    <div class="col-md-6">
                                                        <label for="marital_status" class="col-form-label text-md-right">{{ __('Marital Status') }}</label>

                                                        <select name="marital_status" id="" type="text" class="form-control @error('marital_status') is-invalid @enderror" value="{{ old('martal_status') }}" >
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

                                                        <input id="picture" type="file" class="form-control" name="picture"  >

                                                        @error('picture')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label for="position" class="col-form-label text-md-right">{{ __('Position') }}</label>
                                                        <select name="position" id="" type="text" class="form-control @error('position') is-invalid @enderror" value="{{ old('position') }}" >
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
                                                            {{ __('Register') }}
                                                        </button>
                                                    </div>
                                                </div>
                                </form>
                                <div class="box box-danger"></div>
                            </div>
                    </div>
            </div>
        </div>

""
@if (auth()->user()->role_name =="super_admin")

<!--PROFILE LIST --->

    <div class="row">
        <!-- TABLE: LATEST ORDERS -->
            <div class="clearfix visible-sm-block"></div>
        <div class="col-md-12 col-sm-12 col-xs-12">
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
                        <div class="col-sm-12">
                            <div class="box box-primary">
                                <div class="box-body box-profile">
                                    <div class="table-responsive">
                                        <table class="table no-margin">
                                            <thead class="bg bg-black" style="color:#fff">
                                                <th>SN</th>
                                                    <th>Image</th>
                                                    <th>Membership ID</th>
                                                    <th>Full Name</th>
                                                    <th>Email</th>
                                                    <th>Gender</th>
                                                    <th>Phone No</th>
                                                    <th>Action</th>

                                                </thead>
                                                <tbody>


                                                    @if (Auth::user()->role_name ==  "super_admin")
                                                    @foreach ($admin_profiles as $profile)

                                                                <tr>
                                                                    <td>{{ ++$loop->index }}</td>
                                                                    <td>
                                                                        @if ($profile->picture == null)
                                                                        <img id="showImage" src="{{ url('profile-images/no_image.jpg') }}" style="width: 50px; width: 50px; border: 1px solid #000000; border-radius:50px;">

                                                                        @else
                                                                        <img class="profile-user-img img-responsive img-circle" src="{{ Storage::url($profile->picture) }}" style="width: 100px; height: 100px; border: 1px solid #000000; border-radius:100%;" alt="User profile picture" height="">

                                                                        @endif

                                                                        {{-- <img class="profile-user-img img-responsive img-circle" src="{{ Storage::url($profile->picture) }}" alt="User profile picture" height="20"> --}}

                                                                    </td>

                                                                    <td>{{ Str::ucfirst($profile->membership_id) }}  {{ Str::ucfirst($profile->sur_name) }}</td>

                                                                    <td>{{ Str::ucfirst($profile->first_name) }} &nbsp; {{ Str::ucfirst($profile->sur_name) }}</td>

                                                                    <td>{{ Auth::user()->email }}</td>

                                                                    <td>{{ $profile->gender }}</td>

                                                                    <td>{{ $profile->phone }}</td>

                                                                    <td class="text-right">

                                                                        <form style="display: inline" action="{{ route('profile.delete', $profile->id) }}" method="post">
                                                                            <div class="btn-group " style="display: inline">
                                                                                <a style="display: inline; font-style: italic;" class="btn btn-primary btn-round btn-out btn-sm mr-3 " href="{{ route('profile.edit',$profile->id) }}"><span class="glyphicon glyphicon-pencil btn-round btn-out"></span>Edit</a>
                                                                                <a style="display: inline; font-style: italic;" class="btn btn-info btn-round btn-out btn-sm mr-3 " href="{{ route('profile.show',$profile->id) }}"><span class="glyphicon glyphicon-pencil btn-round btn-out"></span>Show</a>

                                                                                @csrf
                                                                                @method('DELETE')
                                                                                <button type="submit" style="display: inline; font-style: italic;" class="btn btn-danger btn-round btn-out btn-sm mr-3 " class=" btn waves-effect waves-light btn-danger btn-round btn-out"><i class="icofont icofont-warning-alt"></i>Delete</button>
                                                                            </div>

                                                                    </form>

                                                                    </td>
                                                                </tr>
                                                    @endforeach
                                                @endif


                                                @if (Auth::user()->role_name ==  "admin")
                                                @foreach ($profiles as $profile)
                                                            <tr>
                                                                    <td>{{ ++$loop->index }}</td>
                                                                    <td>
                                                                        @if (!$profile->picture !== null)
                                                                        <img id="showImage" src="{{ url('profile-images/no_image.jpg') }}" style="width: 50px; width: 50px; border: 1px solid #000000; border-radius:50px;">

                                                                        @else
                                                                        <img class="justify-content-center rounded-circle profile-user-img img-responsive img-circle"  src="{{ Storage::url("images/ ".$profile->picture) }}" alt="" title="" style="width: 50px; width: 50px; border: 1px solid #000000; border-radius:50px;">

                                                                        @endif

                                                                        {{-- <img class="profile-user-img img-responsive img-circle" src="{{ Storage::url($profile->picture) }}" alt="User profile picture" height="20"> --}}

                                                                    </td>

                                                                    <td>{{ Str::ucfirst($profile->membership_id) }}  {{ Str::ucfirst($profile->sur_name) }}</td>

                                                                    <td>{{ Str::ucfirst($profile->first_name) }} &nbsp; {{ Str::ucfirst($profile->sur_name) }}</td>

                                                                    <td>{{ Auth::user()->email }}</td>

                                                                    <td>{{ $profile->gender }}</td>

                                                                    <td>{{ $profile->phone }}</td>

                                                                    <td class="text-right">

                                                                        <form style="display: inline" action="{{ route('profile.delete', $profile->id) }}" method="post">
                                                                            @csrf
                                                                        @method('DELETE')

                                                                            <a class=" btn btn-primary btn-round btn-out btn-xs mr-3 btn-round btn-out" href="{{ route('profile.edit',$profile->id) }}"><span class="glyphicon glyphicon-pencil btn-round btn-out"></span>Edit</a>
                                                                            <a class=" btn btn-info btn-round btn-out btn-xs mr-3 btn-round btn-out"  href="{{ route('profile.show',$profile->id) }}"><span class="glyphicon glyphicon-book btn-round btn-out"></span>Show</a>

                                                                        <button type="submit" class=" btn btn-danger btn-round btn-out btn-xs mr-3 btn-danger btn-round btn-out"><span class="glyphicon glyphicon-trash btn-round btn-out"></span>Delete</button>

                                                                    </form>

                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                                @endif

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
@endif


</section>
</div>
</div>


{{--
  </div>
  <!-- /.table-responsive -->
</div>
</div>
</div> --}}
      <!-- /.content -->
{{-- </div> --}}

@endsection






