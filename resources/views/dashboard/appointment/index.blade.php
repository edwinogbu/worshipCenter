@extends('layouts.mainApp')

@section('content')

    <div class="container">
         <!-- About Me Box -->
         <div class="box box-primary p-5">
            <div class="box-header with-border">
                <h3 class="box-title">Appointment Booking Dashboard</h3>
            </div>
        </div>
    {{-- </div> --}}
        <!-- /.box -->
        <div class="row justify-content-center">

                <section class="content-header with-border">

                <div class="box box-header with-border box-success">
                    <h1>
                        {{ Auth::user()->first_name }}'s Profile
                    </h1>
                </div>

                </section>

                <!-- Main content -->
                <section class="content">

                        <div class="col-md-12">
                            <div class="row">
                                <!-- TABLE: LATEST ORDERS -->
                                <div class="clearfix visible-sm-block"></div>

                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="box box-danger"  >
                                        <div class="box-header with-border">
                                            <div class="user-block mb-4">
                                                    <img class="justify-content-center rounded-circle" src="{{ asset('img/agclogo.png')}}" alt="" title="" height="20px" width="20px">
                                                    <span class="username">
                                                        <a href="#">Program Alert: Settle me Oh God April Edition </a>

                                                        </span>
                                                    <span class="description">Since july 18 - 7:30 PM today</span>
                                                    <div class="text-right">
                                                        <p class="btn btn-group">
                                                            <a  data-toggle="modal" data-target="#modal-appoints" class="btn btn-lg bg-primary mx-5" style="background-color:; color: #fffff1"><b>Create Appointments</b></a>
                                                            {{-- <a  data-toggle="modal" data-target="#modal-blog" class="btn btn-lg mx-5 p-5" style="background-color: #f82249; color: #fffff1"><b>Create Post</b></a> --}}

                                                         </p>
                                                        {{-- <a class="btn btn-success btn-round btn-out btn-md m-5 mb-4 ml-5 " href=""><span class="glyphicon glyphicon-book btn-round btn-out"></span>Create Post</a> --}}

                                                    </div>
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
                                                            <table class="table no-margin  table-bordered " >
                                                                <thead class="bg bg-black" style="color:#fff">
                                                                <tr>
                                                                    <th>
                                                                        <div class="chk-option">
                                                                            <div class="checkbox-fade fade-in-primary">
                                                                                <span >SN</span>
                                                                            </div>
                                                                        </div>
                                                                    </th>

                                                                    <th width="">Name</th>
                                                                    <th width="">Email</th>
                                                                    <th width="">Gender</th>
                                                                    <th width="">Phone</th>
                                                                    <th width="">Ticket Type </th>
                                                                    <th width="">Appointment Type</th>
                                                                    <th width="">Address</th>
                                                                    <th class="">Occupation</th>
                                                                    <th class="text-right">Action</th>

                                                                </thead>                                                                        Author</th>

                                                                <tbody>

                                                                    @foreach ($appointments as $appoint)

                                                                    <tr style="border: 3px solid red; border-right: 3px solid red">
                                                                        <td>
                                                                        <div class="chk-option">
                                                                            <div class="checkbox-fade fade-in-primary">
                                                                                <label class="check-task" >
                                                                                    <input type="checkbox" value="" style="padding:20px; border: 3px solid red; border-right: 3px solid red">
                                                                                    <span class="cr">
                                                                                                {{-- <i class="cr-icon fa fa-check txt-default"></i> --}}
                                                                                            </span>
                                                                                </label>
                                                                            </div>
                                                                        </div>

                                                                        </td>
                                                                        <td>
                                                                    <div class="d-inline-block align-middle">
                                                                            {{-- <img src="{{ Storage::url($post->picture) }}" alt="user image" class="img-radius img-40 align-top m-r-15"> --}}
                                                                            <div class="d-inline-block">
                                                                                <h6>{{ $appoint->name }}</h6>
                                                                                {{-- <p class="text-muted m-b-0">{{ auth()->user()->name }}</p> --}}
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        {{ Str::words(strtoupper($appoint->email), $words =3, $end='..') }}
                                                                    </td>
                                                                    <td>
                                                                        {{ Str::words(strtolower($appoint->phone), $words =5, $end='..') }}<br>

                                                                    </td>
                                                                    <td>{{ $appoint->gender }}</td>
                                                                    <td>{{ $appoint->ticket_type }}</td>
                                                                    <td>{{ $appoint->appointment_type }}</td>
                                                                    <td>{{ $appoint->address }}</td>
                                                                    <td>{{ $appoint->occupation }}</td>
                                                                    {{-- <td>{{ $post->created_at }}</td> --}}


                                                                    <td style="border: 3px solid red; border-right: 3px solid red">


                                                                        <form style="display: inline" action="{{ route('user.post.delete', $appoint->id) }}" method="post">
                                                                            <div class="btn-group " style="display: inline">
                                                                            <a style="display: inline" class="btn btn-primary btn-round btn-out btn-xs mr-3 " href="{{ route('user.post.edit',$appoint->id) }}"><span class="glyphicon glyphicon-pencil btn-round btn-out"></span>Edit</a>

                                                                            @csrf
                                                                        @method('DELETE')
                                                                        <button style="display: inline" type="submit" class=" btn btn-round btn-out btn-xs mr-3 btn-danger btn-round btn-out"><i class="icofont icofont-warning-alt"></i>Delete</button>

                                                                    </div>
                                                                    </form>

                                                                    </td>

                                                                </tr>
                                                                @endforeach

                                                                </tbody>
                                                            </table>
                                                            <a href="#" class="btn btn-block " style="background-color: #f82249; color: #fffff1"><b></b></a>

                                                            </div>
                                                        </div>
                                                    </div>
                                                        <div class="box box-danger"></div>
                                                </div>

                                            </div>
                                            </div>

                                        </div>
                                </div>


                                <!-- /.col -->

                            </div>
                        </div>
                        <!-- /.table-responsive -->
                </section>



                <!--APPOINTMENT MODAL--->
                <div class="modal fade" id="modal-appoints">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Default Modal</h4>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('user.appointment.store') }}" class="box-body box-profile mx-5"  enctype="multipart/form-data">

                                            @if ($msg=Session::get('success'))
                                            <div class="alert alert-success">{{ $msg }}</div>
                                            @endif

                                            @if ($msg=Session::get('fail'))
                                            <div class="alert alert-danger">{{ $msg }}</div>
                                            @endif

                                            @csrf

                                            <div class="form-group row">
                                                <div class="col-md-6">
                                                    <label for="name" class="col-form-label text-md-right">{{ __('name') }}</label>

                                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

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

                                                        <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                                        @error('email')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>


                                                </div>


                                            <div class="form-group row">

                                                    <div class="col-md-6">
                                                        <label for="ticket_type" class="col-form-label text-md-right">{{ __('ticket_type Type') }}</label>
                                                        <select name="ticket_type" id="" type="text" class="form-control @error('ticket_type') is-invalid @enderror"  value="{{ old('ticket_type') }}" >
                                                            <option value="#">select...</option>
                                                            <option value="member">member</option>
                                                            <option value="non member">non member</option>
                                                            <option value="premium access">premium access</option>
                                                        </select>

                                                        @error('ticket_type')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label for="appointment_type" class="col-form-label text-md-right">{{ __('Appointment Type') }}</label>
                                                        <select name="appointment_type" id="" type="text" class="form-control @error('gender') is-invalid @enderror"  value="{{ old('appointment_type') }}" >
                                                            <option value="#">select...</option>
                                                            <option value="deliverance">deliverance</option>
                                                            <option value="counselling">counselling</option>
                                                            <option value="prayer">prayer</option>
                                                        </select>

                                                        @error('appointment_type')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>


                                            </div>


                                            <div class="form-group row">

                                                <div class="col-md-6">
                                                    <label for="address" class="col-form-label text-md-right">{{ __('Address') }}</label>

                                                    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>

                                                    @error('address')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="occupation" class="col-form-label text-md-right">{{ __('Occupation') }}</label>

                                                    <input id="occupation" type="text" class="form-control @error('occupation') is-invalid @enderror" name="occupation" value="{{ old('occupation') }}" required autocomplete="occupation" autofocus>

                                                    @error('occupation')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                            </div>

                                            <div class="form-group row mb-0 text-center">
                                                <div class="col text-center">
                                                    <button type="submit" class="btn btn-lg btn-danger" style="background-color: #f24; color:#fff; float:center">
                                                        {{ __('Register') }}
                                                    </button>
                                                </div>
                                            </div>
                            </form>
                        </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                {{-- <button type="submit" class=" b-b-primary btn-success btn-round btn btn-out">Create</button> --}}
                            </div>
                        </div>
                    <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!--END APPOINTMENT MODAL--->








        </div>
    </div>

@endsection


