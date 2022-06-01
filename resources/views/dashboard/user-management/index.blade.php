@extends('layouts.mainApp')


@section('content')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
<!-- Theme style -->


    <div class="container">
        <div class="row justify-content-center">

                <section class="content-header with-border">

                <div class="box box-header with-border box-success">
                    <h1 class="text-center">
                        User Roles Settings.

                        <marquee behavior="scrol" direction="">
                            <h4>

                                <span style="color: #27137e62">
                                    Welcome Daddy!.. {{ Auth::user()->first_name }}<br>
                                    God Bless You Prophet
                                </span>
                            </h4>
                       </marquee>
                    </h1>
                </div>

                </section>

                <!-- Main content -->
                <section class="content">

                        <div class="col-md-12">
                            <div class="row">
                                <!-- TABLE: LATEST ORDERS -->
                                <div class="clearfix visible-sm-block"></div>
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
                                                <div class="col-sm-6 pull-center" style="color:#22aaf8; margin:0px; text-align:center;">
                                                    <div class="row" style="color:#22aaf8; margin:0px; text-align:center;">
                                                        <span style="color:#22aaf8; margin:0px; text-align:center;">Membership Verification</span>
                                                    </div>
                                                    <form action="{{ route('user.userManagement.index') }}" method="get" class="sidebar-form " style="background-color: #ffffff;">
                                                        @csrf
                                                        {{-- <label for="membership_id" class="input-label" style="display: inline">Membership ID</label> --}}
                                                        <div class="input-group">
                                                            <span class="input-group-btn">
                                                                    <a href="{{ route('user.userManagement.index') }}" class=" mt-1">
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

                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="box box-danger"  >
                                        <div class="box-header with-border">
                                            <div class="user-block mb-4">
                                                    <img class="justify-content-center rounded-circle" src="{{ asset('img/logo-mega-glory-crest.png')}}" alt="" title="" height="200px" width="200px">
                                                    <span class="username pull-center">
                                                        <a href="#">View Appointments</a>

                                                        </span>
                                                    {{-- <span class="description">Since july 18 - 7:30 PM today</span> --}}
                                                    <div class="text-right">
                                                        <p class="btn btn-group">
                                                            <a  data-toggle="modal" data-target="#modal-users" class="btn btn-lg bg-primary mx-5" style="background-color:; color: #fffff1"><b>Create User</b></a>
                                                            {{-- <a  data-toggle="modal" data-target="#modal-blog" class="btn btn-lg mx-5 p-5" style="background-color: #f82249; color: #fffff1"><b>Create Post</b></a> --}}

                                                         </p>
                                                        {{-- <a class="btn btn-success btn-round btn-out btn-md m-5 mb-4 ml-5 " href=""><span class="glyphicon glyphicon-book btn-round btn-out"></span>Create Post</a> --}}


                                                    @if (Session::has('message'))
                                                    <div class="alert alert-success alert-dismissible fade show rounded" role="alert">
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">×</span></button> <i class="fa fa-info mx-2"></i>
                                                        <strong>{!! session('message') !!}</strong>
                                                    </div>
                                                    @endif
                                                    </div>
                                            </div>
                                            <div class="box-tools pull-right">
                                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                            </div>

                                        </div>
                                        <!-- /.box-header -->

                                        @if (Session::has('message'))
                                        <div class="alert alert-success alert-dismissible fade show rounded" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span></button> <i class="fa fa-info mx-2"></i>
                                            <strong>{!! session('message') !!}</strong>
                                        </div>
                                        @endif
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

                                                                    <th width="">Full Name</th>
                                                                    <th width="">Email</th>
                                                                    <th width="">Phone</th>
                                                                    <th width="">Role</th>

                                                                    <th class="text-right">Action</th>
                                                                </tr>
                                                                </thead>                                                                        Author</th>

                                                                <tbody>

                                                            @foreach ($userManagements as $userManagement)

                                                                <tr style="border: 3px solid red; border-right: 3px solid red">
                                                                        <td>
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
                                                                    <div class="d-inline-block align-middle">
                                                                            {{-- <img src="{{ Storage::url($post->picture) }}" alt="user image" class="img-radius img-40 align-top m-r-15"> --}}
                                                                            <div class="d-inline-block">
                                                                                <h6>{{ $userManagement->first_name. ' '.$userManagement->sur_name  }}</h6>
                                                                                {{-- <p class="text-muted m-b-0">{{ auth()->user()->name }}</p> --}}
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        {{ Str::words(strtoupper($userManagement->email), $words =3, $end='..') }}
                                                                    </td>
                                                                    <td>
                                                                        {{ Str::words(strtolower($userManagement->phone), $words =5, $end='..') }}<br>

                                                                    </td>
                                                                    <td>{{ $userManagement->role_name }}</td>
                                                                    {{-- <td>{{ $management->ticket_type }}</td>
                                                                    <td>{{ $management->appointment_type }}</td>
                                                                    <td>{{ $management->address }}</td>
                                                                    <td>{{ $management->occupation }}</td> --}}
                                                                    {{-- <td>{{ $post->created_at }}</td> --}}


                                                                      <td style="border: 3px solid red; border-right: 3px solid red">
                                                                        <div class="button-group">

                                                                            <a href="{{ route('user.userManagement.edit', $userManagement->id) ?? '' }}" class="btn btn-xl btn-info" style="background-color:; color: #fffff1"><b>View</b></a>

                                                                            <form style="display: inline" action="{{ route('user.userManagement.delete', $userManagement->id) }}" method="post">
                                                                                <div class="btn-group " style="display: inline">
                                                                                    <a style="display: inline; font-style: italic;" class="btn btn-primary btn-round btn-out btn-sm mr-3 " href="{{ route('user.userManagement.edit',$userManagement->id) }}"><span class="glyphicon glyphicon-pencil btn-round btn-out"></span>_Edit_Role</a>

                                                                                    @csrf
                                                                                    @method('DELETE')
                                                                                    <button style="display: inline; font-style: italic;" type="submit" class=" btn btn-round btn-out btn-sm mr-3 btn-danger btn-round btn-out"><span class="glyphicon glyphicon-trash btn-round btn-out"></span>_Delete</button>

                                                                                </div>
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
                    </div>

                    <section class="conten">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="box">
                                    <div class="box-header">
                                      <h3 class="box-title">Data Table With Full Features</h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                      <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"><div class="dataTables_length" id="example1_length"><label>Show <select name="example1_length" aria-controls="example1" class="form-control input-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-6"><div id="example1_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="example1"></label></div></div></div><div class="row"><div class="col-sm-12"><table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                        <thead>
                                        <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 192.281px;">Rendering engine</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 243.141px;">Browser</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 223.516px;">Platform(s)</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 165.984px;">Engine version</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 122.078px;">CSS grade</th></tr>
                                        </thead>
                                        <tbody>
                                        <tr role="row" class="odd">
                                          <td class="sorting_1">Gecko</td>
                                          <td>Firefox 1.0</td>
                                          <td>Win 98+ / OSX.2+</td>
                                          <td>1.7</td>
                                          <td>A</td>
                                        </tr><tr role="row" class="even">
                                          <td class="sorting_1">Gecko</td>
                                          <td>Firefox 1.5</td>
                                          <td>Win 98+ / OSX.2+</td>
                                          <td>1.8</td>
                                          <td>A</td>
                                        </tr><tr role="row" class="odd">
                                          <td class="sorting_1">Gecko</td>
                                          <td>Firefox 2.0</td>
                                          <td>Win 98+ / OSX.2+</td>
                                          <td>1.8</td>
                                          <td>A</td>
                                        </tr><tr role="row" class="even">
                                          <td class="sorting_1">Gecko</td>
                                          <td>Firefox 3.0</td>
                                          <td>Win 2k+ / OSX.3+</td>
                                          <td>1.9</td>
                                          <td>A</td>
                                        </tr><tr role="row" class="odd">
                                          <td class="sorting_1">Gecko</td>
                                          <td>Camino 1.0</td>
                                          <td>OSX.2+</td>
                                          <td>1.8</td>
                                          <td>A</td>
                                        </tr><tr role="row" class="even">
                                          <td class="sorting_1">Gecko</td>
                                          <td>Camino 1.5</td>
                                          <td>OSX.3+</td>
                                          <td>1.8</td>
                                          <td>A</td>
                                        </tr><tr role="row" class="odd">
                                          <td class="sorting_1">Gecko</td>
                                          <td>Netscape 7.2</td>
                                          <td>Win 95+ / Mac OS 8.6-9.2</td>
                                          <td>1.7</td>
                                          <td>A</td>
                                        </tr><tr role="row" class="even">
                                          <td class="sorting_1">Gecko</td>
                                          <td>Netscape Browser 8</td>
                                          <td>Win 98SE+</td>
                                          <td>1.7</td>
                                          <td>A</td>
                                        </tr><tr role="row" class="odd">
                                          <td class="sorting_1">Gecko</td>
                                          <td>Netscape Navigator 9</td>
                                          <td>Win 98+ / OSX.2+</td>
                                          <td>1.8</td>
                                          <td>A</td>
                                        </tr><tr role="row" class="even">
                                          <td class="sorting_1">Gecko</td>
                                          <td>Mozilla 1.0</td>
                                          <td>Win 95+ / OSX.1+</td>
                                          <td>1</td>
                                          <td>A</td>
                                        </tr></tbody>
                                        <tfoot>
                                        <tr><th rowspan="1" colspan="1">Rendering engine</th><th rowspan="1" colspan="1">Browser</th><th rowspan="1" colspan="1">Platform(s)</th><th rowspan="1" colspan="1">Engine version</th><th rowspan="1" colspan="1">CSS grade</th></tr>
                                        </tfoot>








                                      </table></div></div><div class="row"><div class="col-sm-5"><div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="col-sm-7"><div class="dataTables_paginate paging_simple_numbers" id="example1_paginate"><ul class="pagination"><li class="paginate_button previous disabled" id="example1_previous"><a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0">Previous</a></li><li class="paginate_button active"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0">1</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="2" tabindex="0">2</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="3" tabindex="0">3</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="4" tabindex="0">4</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="5" tabindex="0">5</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="6" tabindex="0">6</a></li><li class="paginate_button next" id="example1_next"><a href="#" aria-controls="example1" data-dt-idx="7" tabindex="0">Next</a></li></ul></div></div></div></div>
                                    </div>
                                    <!-- /.box-body -->
                                  </div>
                            </div>
                        </div>
                    </section>






                </div>





                </section>



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








        </div>
    </div>

    <script src="{{ asset('datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>

    <!-- page script -->
    <script>
      $(function () {
        $('#example1').DataTable()
        $('#example2').DataTable({
          'paging'      : true,
          'lengthChange': false,
          'searching'   : false,
          'ordering'    : true,
          'info'        : true,
          'autoWidth'   : false
        })
      })
    </script>
@endsection

