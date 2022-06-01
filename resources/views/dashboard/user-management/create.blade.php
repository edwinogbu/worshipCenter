@extends('layouts.mainApp')


@section('content')

<div class="container">
    <div class="row justify-content-center">


      <!-- Main content -->
    <section class="content">

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

                    <div class="box box-danger"></div>

                </div>
            </div>
        </div>


    </section>


    </div>
</div>
      <!-- /.content -->
{{-- </div> --}}

@endsection






