@extends('layouts.mainApp')


@section('content')


<div class="box box-primary p-5">
    <div class="box-header with-border p-5">
        <a style="
        /* background-color: #f82249; */
         color: #FFFFFF display: inline; font-style: italic; margin:20px;"
         class="btn btn-primary pull-right btn-round btn-out btn-lg btn btn-lg bg-primary mx-5"
         href="{{ route('user.home') }}"><span class="glyphicon glyphicon-user btn-round btn-out"></span>

            User Home Dashboard</span>
        </a>

        <h3 class="profile-username text-center"><span style="color:green; backgroud:white">

            <h2 class="box-title"><span style="color:green; backgroud:white">
                <h2 class="box-title">
                    <span><Strong>Users Profile DashBoard</Strong></span>

                </h2>

            </span>
            </h2>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">


    <div class="card-body">
{{-- <div class="content-wrapper" style="min-height: 1126px;"> --}}
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>

            <span><Strong>Users Profile</Strong></span>
        </h1>
 <p>
     @if (auth()->user()->role_name == 'super_admin')
     <a  data-toggle="modal" data-target="#modal-users" class="btn btn-lg bg-primary mx-5" style="background-color:; color: #fffff1"><b>Register User</b></a>
     <a  data-toggle="modal" data-target="#modal-profile" class="btn btn-lg bg-primary mx-5" style="background-color: #f82249; color: #fffff1"><b>User Profile</b></a>

     @else
     {{-- <a href="#" class="btn btn-lg " style="background-color: #f82249; color: #fffff1"><b>Create Profile</b></a> --}}

     @endif

 </p>
      </section>

      <!-- Main content -->
      <section class="content">

    <div class="row">
        <!-- TABLE: LATEST ORDERS -->
        <div class="clearfix visible-sm-block"></div>
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="box box-danger"  >
                <div class="box-header with-border">
                    <div class="user-block">
                        <img class="justify-content-center rounded-circle" src="{{ asset('img/logo-mega-glory-full.png')}}" alt="" title="" height="20px" width="20px">
                        <span class="username">
                            <a href="#">position: {{ auth()->user()->profile->position }}</a>

                            </span>
                        <span class="description">Since:  {{ auth()->user()->profile->date_joined }}</span>
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
                        <div class="col-sm-12, col-md-12 col-xs-12 ">
                            <div class="box box-primary">
                                <div class="box-body box-profile">
                                    <div class="table-responsive">
                                        <table class="table no-margin  table-bordered " >
                                            <thead class="bg bg-black p-5" style="color:#fff; padding:60px; margin:10px">
                                            <tr>
                                                <th width="5%">
                                                    <div class="chk-option">
                                                        <div class="checkbox-fade fade-in-primary">
                                                            <span >SN</span>
                                                        </div>
                                                    </div>
                                                </th>

                                                    <th width="">Image</th>
                                                    <th width="">Membership ID</th>
                                                    <th width="">Full Name</th>
                                                    <th width="">Email</th>
                                                    <th width="">Gender</th>
                                                    <th width="">Phone No</th>
                                                    <th width="20%" class="text-center">Action</th>

                                                </thead>
                                                <tbody>

                                                    @if (Auth::user()->role_name ==  "super_admin")
                                                        @foreach ($admin_profiles as $profile)

                                                        <tr style="border: 3px solid red; border-right: 3px solid red">
                                                            <td width="5%">
                                                            <div class="chk-option">
                                                                <div class="checkbox-fade fade-in-primary">
                                                                    <label class="check-task" >
                                                                        <input type="checkbox" value="" style="padding:20px; border: 3px solid red; border-right: 3px solid red">
                                                                        <span class="cr">
                                                                                    {{-- <i class="cr-icon fa fa-check txt-default"></i> --}}
                                                                                    {{  ++$loop->index }}
                                                                                </span>
                                                                    </label>
                                                                </div>
                                                            </div>

                                                            </td>
                                                            <td>
                                                                @if ($profile->picture == null)
                                                                <img id="showImage" src="{{ url('profile-images/no_image.jpg') }}" style="width: 50px; width: 50px; border: 1px solid #000000; border-radius:50px;">

                                                                @else
                                                                <img class="profile-user-img img-responsive img-circle" src="{{ Storage::url($profile->picture) }}" style="width: 100px; height: 100px; border: 1px solid #000000; border-radius:100%;" alt="User profile picture" height="">

                                                                @endif

                                                                {{-- <img class="profile-user-img img-responsive img-circle" src="{{ Storage::url($profile->picture) }}" alt="User profile picture" height="20"> --}}

                                                            </td>
                                                            <td>
                                                                    <div class="d-inline-block align-middle">
                                                                            {{-- <img src="{{ Storage::url($post->picture) }}" alt="user image" class="img-radius img-40 align-top m-r-15"> --}}
                                                                            <div class="d-inline-block">
                                                                                {{-- <h6>{{ $userManagement->first_name. ' '.$userManagement->sur_name  }}</h6> --}}
                                                                                {{ Str::ucfirst($profile->membership_id) }}
                                                                            </div>
                                                                        </div>
                                                            </td>




                                                                        <td>{{ Str::ucfirst($profile->user->first_name) }} &nbsp; {{ Str::ucfirst($profile->user->sur_name) }}</td>

                                                                        <td>{{ Auth::user()->email }}</td>

                                                                        <td>{{ $profile->gender }}</td>

                                                                        <td>{{ $profile->user->phone }}</td>

                                                                        <td style="border: 3px solid red; border-right: 3px solid red" class="text-right">

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

                                                        @foreach ($profile as $profile)

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

                                                                        <td>{{ Str::ucfirst(Auth::user()->membership_id) }} </td>

                                                                        <td>{{ Str::ucfirst(Auth::user()->first_name) }} &nbsp; {{ Str::ucfirst(Auth::user()->sur_name) }}</td>

                                                                        <td>{{ Auth::user()->email }}</td>

                                                                        <td>{{ $profile->gender }}</td>

                                                                        <td>{{ Auth::user()->phone }}</td>

                                                                        <td class="text-right">

                                                                            <form style="display: inline" action="{{ route('profile.delete', $profile->id) }}" method="post">
                                                                                <div class="btn-group " style="display: inline">
                                                                                    <a style="display: inline; font-style: italic;" class="btn btn-primary btn-round btn-out btn-xs mr-3 " href="{{ route('profile.edit',$profile->id) }}"><span class="glyphicon glyphicon-pencil btn-round btn-out"></span>Edit</a>
                                                                                    <a style="display: inline; font-style: italic;" class="btn btn-info btn-round btn-out btn-xs mr-3 " href="{{ route('profile.show',$profile->id) }}"><span class="glyphicon glyphicon-pencil btn-round btn-out"></span>Show</a>

                                                                                    @csrf
                                                                                    @method('DELETE')
                                                                                    <button type="submit" style="display: inline; font-style: italic;" class="btn btn-danger btn-round btn-out btn-xs mr-3 " class=" btn waves-effect waves-light btn-danger btn-round btn-out"><i class="icofont icofont-warning-alt"></i>Delete</button>
                                                                                </div>

                                                                        </form>

                                                                        </td>
                                                                    </tr>
                                                        @endforeach
                                                    @endif
                                                    @if (Auth::user()->role_name ==  "user")

                                                        @foreach ($profile as $profile)

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

                                                                        <td>{{ Str::ucfirst(Auth::user()->membership_id) }}  {{ Str::ucfirst($profile->sur_name) }}</td>

                                                                        <td>{{ Str::ucfirst(Auth::user()->first_name) }} &nbsp; {{ Str::ucfirst(Auth::user()->sur_name) }}</td>

                                                                        <td>{{ Auth::user()->email }}</td>

                                                                        <td>{{ $profile->gender }}</td>

                                                                        <td>{{ Auth::user()->phone }}</td>

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




                <!--USER REGISTER MODAL--->
                <div class="modal fade" id="modal-users">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" style="font-style: italic; color:#11e060;">Creating New User. Please wait....</h4>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('user.userManagement.store') }}" class="box-body box-profile mx-5"  enctype="multipart/form-data">

                                            @if ($msg=Session::get('success'))
                                            <div class="alert alert-success">{{ $msg }}</div>
                                            @endif

                                            @if ($msg=Session::get('fail'))
                                            <div class="alert alert-danger">{{ $msg }}</div>
                                            @endif

                                            @csrf




                                            <div class="form-group row">
                                                <div class="col-md-6">
                                                    <label for="first_name" class="col-form-label text-md-right">{{ __('first_name') }}</label>

                                                    <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>

                                                    @error('first_name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="sur_name" class="col-form-label text-md-right">{{ __('sur_name') }}</label>

                                                    <input id="sur_name" type="text" class="form-control @error('sur_name') is-invalid @enderror" name="sur_name" value="{{ old('sur_name') }}" required autocomplete="sur_name" autofocus>

                                                    @error('sur_name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>


                                            </div>

                                                <div class="form-group row">

                                                    <div class="col-md-6">
                                                        <label for="phone" class="col-form-label text-md-right">{{ __('Phone') }}</label>

                                                        <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                                                        @error('phone')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>


                                                    <div class="col-md-6">
                                                        <label for="email" class="col-form-label text-md-right">{{ __('Email') }}</label>

                                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                                        @error('email')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>


                                                </div>


                                            <div class="form-group row">

                                                    <div class="col-md-6">
                                                        <label for="role_name" class="col-form-label text-md-right">{{ __('role_name Type') }}</label>
                                                        <select name="role_name" id="" type="text" class="form-control @error('role_name') is-invalid @enderror"  value="{{ old('role_name') }}" >
                                                            <option value="#">select...</option>
                                                            <option value="super_admin">super admin</option>
                                                            <option value="admin">admin</option>
                                                            <option value="user">user</option>
                                                        </select>

                                                        @error('role_name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>


                                                    <div class="col-md-6">
                                                        <label for="password" class="col-form-label text-md-right">{{ __('password') }}</label>

                                                        <input id="password" type="text" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="password" autofocus>

                                                        @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                            </div>



                                            <div class="form-group row mb-0 text-center">
                                                <div class="col text-center">
                                                    <button type="submit" class="btn btn-lg btn-success" style="background-color: #; color:#fff; float:center">
                                                        {{ __('Register') }}
                                                    </button>
                                                </div>
                                            </div>
                            </form>
                        </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger btn-lg pull-left" data-dismiss="modal">Close</button>
                                {{-- <button type="submit" class=" b-b-primary btn-success btn-round btn btn-out">Create</button> --}}
                            </div>
                        </div>
                    <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!--END APPOINTMENT MODAL--->


                <!--PROFILE MODAL--->
                <div class="modal fade" id="modal-profile">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" style="font-style: italic; color:#11e060;">Creating New User. Please wait....</h4>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('profile.store') }}" class="box-body box-profile mx-5"  enctype="multipart/form-data">

                                @if ($msg=Session::get('success'))
                                <div class="alert alert-success">{{ $msg }}</div>
                                @endif

                                @if ($msg=Session::get('fail'))
                                <div class="alert alert-danger">{{ $msg }}</div>
                                @endif

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

                                        <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>

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

                                        <input id="dob" type="date" class="form-control @error('dob') is-invalid @enderror" name="qualification" value="{{ old('dob') }}" required autocomplete="dob" autofocus>

                                        @error('dob')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>


                                    <div class="col-md-6">
                                        <label for="membership_status" class="col-form-label text-md-right">{{ __('Membership Status') }}</label>
                                        <select name="membership_status" id="" type="text" class="form-control @error('membership_status') is-invalid @enderror" value="{{ old('membership_status') }}" >
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

                                        <input id="occupation" type="text" class="form-control @error('occupation') is-invalid @enderror" name="occupation" value="{{ old('occupation') }}" required autocomplete="occupation" autofocus>

                                        @error('occupation')
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

                                            <textarea  id="skill" type="text" class="form-control @error('skill') is-invalid @enderror" name="skill" value="{{ old('skill') }}" cols="10" rows="4">
                                            </textarea>
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
                        </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger btn-lg pull-left" data-dismiss="modal">Close</button>
                                {{-- <button type="submit" class=" b-b-primary btn-success btn-round btn btn-out">Create</button> --}}
                            </div>
                        </div>
                    <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!--END APPOINTMENT MODAL--->





@endsection


