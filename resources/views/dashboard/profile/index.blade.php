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
     @if (auth()->user()->role_name == "super_admin")

     <a  data-toggle="modal" data-target="#modal-users" class="btn btn-lg bg-primary mx-5" style="background-color:; color: #fffff1"><b>Register New User</b></a>
     <a  data-toggle="modal" data-target="#modal-profile" class="btn btn-lg bg-primary mx-5" style="background-color: #f82249; color: #fffff1"><b> User Profile</b></a>
     @else

     <a  data-toggle="modal" data-target="#modal-profile" class="btn btn-lg bg-primary mx-5" style="background-color: #f82249; color: #fffff1"><b> User Profile</b></a>
     @endif
    {{-- <a href="#" class="btn btn-lg " style="background-color: #f82249; color: #fffff1"><b>Create Profile</b></a> --}}

</p>
</section>

<!-- Main content -->
<section class="content">

    <div class="row">

                                        @if ($msg=Session::get('success'))
                                        <div class="alert alert-success">{{ $msg }}</div>
                                        @endif

                                        @if ($msg=Session::get('fail'))
                                        <div class="alert alert-danger">{{ $msg }}</div>
                                        @endif
        <!-- TABLE: LATEST ORDERS -->
        <div class="clearfix visible-sm-block"></div>
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="box box-danger"  >
                <div class="box-header with-border">
                    <div class="user-block">
                        <img class="justify-content-center rounded-circle" src="{{ asset('img/logo-mega-glory-full.png')}}" alt="" title="" height="20px" width="20px">
                        <span class="username">
                            <a href="#">position:

                                @if (auth()->user()->profile !=null)
                                {{ !empty(auth()->user()->profile) ? Str::ucfirst(Auth::user()->profile->position):'No data pls update profile' }}
                                @endif
                            </a>

                            </span>
                        <span class="description">Since:
                            @if (auth()->user()->profile !=null)
                            {{ !empty(auth()->user()->profile) ? Str::ucfirst(Auth::user()->profile->membership_id):'No data pls update profile' }}
                            @endif
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
                        <div class="col-sm-12, col-md-12 col-xs-12 ">
                            <div class="box box-primary">
                                <div class="box-body box-profile">
                                    <div class="table-responsive">
                                        <table class="table no-margin">
                                                <thead>
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
                                                                            @if ( Auth::user()->profile->id !== null)
                                                                            <img class="profile-user-img img-responsive img-circle" src="{{ Storage::url(Auth::user()->profile->picture) }}" style="width: 100px; height: 100px; border: 1px solid #000000; border-radius:100%;" alt="User profile picture" height="">
                                                                            {{-- <img src="{{ Storage::url(Auth::user()->profile->picture) }}" class="user-image" alt="User Image"> --}}

                                                                            @else
                                                                            <img src="{{ asset('dist/img/avatar04.png') }}" class="user-image" alt="User Image">

                                                                            @endif

                                                                            {{-- <img class="profile-user-img img-responsive img-circle" src="{{ Storage::url($profile->picture) }}" alt="User profile picture" height="20"> --}}

                                                                        </td>

                                                                        <td>{{ Str::ucfirst(Auth::user()->profile->membership_id) }}  {{ Str::ucfirst($profile->sur_name) }}</td>

                                                                        <td>{{ Str::ucfirst(Auth::user()->first_name) }} &nbsp; {{ Str::ucfirst(Auth::user()->sur_name) }}</td>

                                                                        <td>{{ Auth::user()->email }}</td>

                                                                        <td>{{ Auth::user()->profile->gender }}</td>

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

                                                                        <td>
                                                                            {{ Str::ucfirst($profile->user->membership_id) }}
                                                                        </td>

                                                                        <td>{{ Str::ucfirst($profile->user->first_name) }} &nbsp; {{ Str::ucfirst($profile->user->sur_name) }}</td>

                                                                        <td>{{ Auth::user()->email }}</td>

                                                                        <td>{{ Auth::user()->profile->gender }}</td>

                                                                        <td>{{ $profile->user->phone }}</td>

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

                                                                        <td>
                                                                            {{ !empty(Str::ucfirst($profile->user)) ? Str::ucfirst($profile->user->membership_id) : 'empty data'  }}
                                                                            {{-- {{ !empty(auth()->user()->profile) ? Str::ucfirst(Auth::user()->profile->qualification):'No data pls update profile' }} --}}

                                                                        </td>

                                                                        <td>
                                                                            {{-- {{ Str::ucfirst($profile->user->first_name) }} &nbsp; {{ Str::ucfirst($profile->user->sur_name) }} --}}
                                                                            {{ !empty(Str::ucfirst($profile->user)) ? Str::ucfirst($profile->user->first_name) : 'empty data'  }}

                                                                        </td>

                                                                        <td>{{ Auth::user()->email }}</td>

                                                                        <td>{{ $profile->gender }}</td>

                                                                        <td>
                                                                            {{ !empty(Str::ucfirst($profile->user)) ? Str::ucfirst($profile->user->phone) : 'empty data'  }}

                                                                            {{-- {{ $profile->user->phone }} --}}
                                                                        </td>

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

                                        <input id="dob" type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ old('dob') }}" required autocomplete="dob" autofocus>

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

                                        <select name="marital_status" id="" type="text" class="form-control @error('marital_status') is-invalid @enderror" value="{{ old('marital_status') }}" >
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



{{--
            <div class="post">
                    <div class="user-block">
                      <img class="img-circle img-bordered-sm" src="../../dist/img/user6-128x128.jpg" alt="User Image">
                          <span class="username">
                            <a href="#">Adam Jones</a>
                            <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                          </span>
                      <span class="description">Posted 5 photos - 5 days ago</span>
                    </div>
                    <!-- /.user-block -->
                    <div class="row margin-bottom">
                      <div class="col-sm-6">
                        <img class="img-responsive" src="{{  asset('img/pastor/pastor21.jpg')}}" alt="Photo">
                        <span class="username">
                            <a href="#">
                                prophet success
                            </a>
                        </span>
                    </div>
                      <!-- /.col -->
                      <div class="col-sm-6">
                        <div class="row">
                          <div class="col-sm-4">

                            <img class="img-responsive" src="{{  asset('img/pastor/pastor21.jpg')}}" alt="Photo">
                            <br>
                            <img class="img-responsive" src="{{  asset('img/pastor/pastor21.jpg')}}" alt="Photo">
                            <br>
                            <img class="img-responsive" src="{{  asset('img/pastor/pastor21.jpg')}}" alt="Photo">
                          </div>
                          <div class="col-sm-4">

                            <img class="img-responsive" src="{{  asset('img/pastor/pastor21.jpg')}}" alt="Photo">
                            <br>
                            <img class="img-responsive" src="{{  asset('img/pastor/pastor21.jpg')}}" alt="Photo">
                            <br>
                            <img class="img-responsive" src="{{  asset('img/pastor/pastor21.jpg')}}" alt="Photo">
                          </div>
                          <!-- /.col -->
                          <div class="col-sm-4">
                              <img class="img-responsive" src="{{  asset('img/pastor/pastor21.jpg')}}" alt="Photo">
                            <br>
                            <img class="img-responsive" src="{{  asset('img/pastor/pastor21.jpg')}}" alt="Photo">
                            <br>
                            <img class="img-responsive" src="{{  asset('img/pastor/pastor21.jpg')}}" alt="Photo">
                          </div>
                          <!-- /.col -->
                        </div>
                        <!-- /.row -->
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <ul class="list-inline">
                      <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                      <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                      </li>
                      <li class="pull-right">
                        <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
                          (5)</a></li>
                    </ul>

                    <input class="form-control input-sm" type="text" placeholder="Type a comment">
            </div> --}}


@endsection


