@extends('layouts.mainApp')

@section('content')

    <div class="container">
        <div class="row justify-content-center">

                <section class="content-header">
                    <h1>
                        {{ Auth::user()->name }}'s Profile
                    </h1>

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
                                            <div class="user-block">
                                                    <img class="justify-content-center rounded-circle" src="{{ asset('img/agclogo.png')}}" alt="" title="" height="20px" width="20px">
                                                    <span class="username">
                                                        <a href="#">Post Testimony Lists: </a>

                                                        </span>
                                                    <span class="description"></span>
                                                    <div class="text-right">
                                                        <a  data-toggle="modal" data-target="#modal-testimony" class="btn btn-lg bg-primary mx-5" style="background-color:; color: #fffff1"><b>Create New Testimony</b></a>
                                                        {{-- <a class="btn btn-success btn-round btn-out btn-md m-5 mb-4 ml-5 " href="{{ route('user.category.create') }}"><span class="glyphicon glyphicon-book btn-round btn-out"></span>Create Category</a> --}}

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
                                                    {!! Toastr::message() !!}

                                                    @if ($msg=Session::get('success'))
                                                    <div class="alert alert-success">{{ $msg }}</div>
                                                    @endif

                                                    @if ($msg=Session::get('fail'))
                                                    <div class="alert alert-danger">{{ $msg }}</div>
                                                    @endif

                                                <div class="col-sm-12">
                                                    <div class="box box-primary">
                                                    <div class="box-body box-profile">
                                                        <div class="table-responsive">

                                                            <table class="table no-margin">
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
                                                                    <th width="">Testimony</th>
                                                                    <th width="">Title</th>
                                                                    <th width="">Created Date</th>
                                                                    <th>Status</th>
                                                                    <th>Published</th>


                                                                    <th class="text-right">Action</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>

                                                                    @foreach ($testimonies as $testimony)

                                                                    <tr style="border: 3px solid red; border-right: 3px solid red">

                                                                        <td>
                                                                        <div class="chk-option">
                                                                            <div class="checkbox-fade fade-in-primary">
                                                                                <label class="check-task">
                                                                                    {{-- <input type="checkbox" value=""> --}}
                                                                                    {{-- <span class="cr">
                                                                                                <i class="cr-icon fa fa-check txt-default"></i>
                                                                                            </span> --}}
                                                                                            {{ ++$loop->index  }}
                                                                                </label>
                                                                            </div>
                                                                        </div>

                                                                    </td>
                                                                    <td>
                                                                        {{ Str::words(strtoupper($testimony->user->first_name), $words =50, $end='..') }}
                                                                        .
                                                                        {{ Str::words(strtoupper($testimony->user->sur_name), $words =50, $end='..') }}
                                                                    </td>

                                                                    <td>
                                                                        {{ Str::words(strtoupper($testimony->body), $words =50, $end='..') }}
                                                                    </td>

                                                                    {{-- <td>
                                                                        {{ Str::words(strtoupper($testimony->user->email), $words =100, $end='..') }}
                                                                    </td> --}}

                                                                    <td>
                                                                        {{ Str::words(strtoupper($testimony->title), $words =50, $end='..') }}
                                                                    </td>

                                                                    <td>
                                                                        <span class="date">{{ Carbon\Carbon::parse($testimony->created_at)->isoFormat('MMM Do YYYY') }}</span>

                                                                    </td>

                                                                    <td style="border: 3px solid red; border-right: 3px solid red">

                                                                        {{-- <button type="submit" class=" btn waves-effect waves-light btn-success btn-round btn-out"><i class="icofont icofont-success-alt"></i> --}}
                                                                            @if ($testimony->status ==1)
                                                                            <span class=" waves-effect waves-light btn-success" style="color: white; padding:5px; margin: 5px; font-style: italic; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif"  class="  waves-effect waves-light btn-success btn-round btn-out"><i class="icofont icofont-success-alt"></i>

                                                                                Published
                                                                            </span>


                                                                            @else
                                                                            <span class=" waves-effect waves-light btn-info" style="color: white; padding:5px; margin: 5px; font-style: italic; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif"  class="  waves-effect waves-light btn-info btn-round btn-out"><i class="icofont icofont-success-alt"></i>
                                                                                pending
                                                                            @endif

                                                                        </td>
                                                                        <td>
                                                                            <form style="display: inline" action="{{ route('user.publish', $testimony->id) }}" method="post">
                                                                                @csrf
                                                                                {{-- <a class="btn btn-primary btn-round btn-out btn-xs mr-3 " href="{{ route() }}">@if ($post->status == 1) @else Published @endif </a> --}}
                                                                                <div class="chk-option">
                                                                                    <div class="checkbox-fade fade-in-primary">
                                                                                        <label class="check-task">
                                                                                            <input type="checkbox" name="status" value="1" {{old('publish'==1 ? 'checked': '') }} class="input-form-check">
                                                                                            {{-- <span class="cr"><i class="cr-icon fa fa-check txt-default"></i></span> --}}
                                                                                        </label>
                                                                                    </div>
                                                                                {{-- <input type="checkbox" name="status" value="1" {{old('status'==1 ? 'checked': '') }} class="input-form-check"> --}}
                                                                                @if ($testimony->publish !==true)
                                                                                <button class="btn btn-round btn-out btn-xs mr-3 btn-success btn-round btn-out"><i class="icofont icofont-check-circled"></i>published</button>
                                                                                @else
                                                                                <button class="btn btn-round btn-out btn-xs mr-3 btn-danger btn-icon"><i class="icofont icofont-check-circled"></i></button>
                                                                                @endif
                                                                            <button type="submit" class=" btn btn-round btn-out btn-xs mr-3 btn-danger btn-round btn-out"><i class="icofont icofont-warning-alt"></i>@if ($testimony->status == 1) Pending @else Published @endif</button>
                                                                        </form>
                                                                        </td>
                                                                        <td style="border: 3px solid red; border-right: 3px solid red">

                                                                        <form style="display: inline" action="{{ route('user.testimony.delete', $testimony->id) }}" method="post">
                                                                            <a style="display: inline" class="btn btn-primary btn-round btn-out btn-xs mr-3 " href="{{ route('user.testimony.edit',$testimony->id) }}"><span class="glyphicon glyphicon-pencil btn-round btn-out"></span>Edit</a>

                                                                            @csrf
                                                                        @method('DELETE')
                                                                        <button style="display: inline" type="submit" class=" btn btn-danger btn-round btn-out btn-xs mr-3 btn-danger btn-round btn-out"><span class="glyphicon glyphicon-trash btn-round btn-out"></span>Delete</button>

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

                                    <div class="col-md-4">
                                        <!-- Profile Image -->
                                        <div class="box box-primary">
                                            <div class="box-body box-profile">
                                                @if (auth()->user()->picture ==null)
                                                <img class="justify-content-center rounded-circle" src="{{ asset('img/agclogo.png')}}" alt="" title="" height="70px" width="70px">
                                                {{-- <img id="showImage" src="{{ url('profile-images/no_image.jpg') }}" style="width: 50px; width: 50px; border: 1px solid #000000; border-radius:50px;"> --}}
                                                @else
                                                <img class="profile-user-img img-responsive img-circle" src="{{ asset('img/agclogo.png') }}" alt="User profile picture" height="100">
                                                @endif

                                                <h3 class="profile-username text-center">{{ Auth::user()->email }}</h3>
                                                <h3 class="profile-username text-center">{{ auth()->user()->id }}</h3>
                                                <strong style="color:red; backgroud:white"><i class="fa fa-user margin-r-5"></i> <span> {{ Auth::user()->email }}'s Profile:</span ><span style="color:green; backgroud:white">Online</span></strong>
                                            <!-- /.box-body -->
                                            </div>
                                            <div class="box box-danger"></div>
                                        </div>
                                        <!-- About Me Box -->
                                        <div class="box box-primary">
                                            <div class="box-header with-border">
                                                <h3 class="box-title">Create a New Category</h3>
                                            </div>
                                        </div>
                                        <!-- /.box -->
                                    </div>
                                <!-- /.col -->

                            </div>
                        </div>
                        <!-- /.table-responsive -->
                </section>

        </div>
    </div>




      <!--PROFILE MODAL--->
      <div class="modal fade" id="modal-testimony">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" style="font-style: italic; color:#11e060;">Creating New Testimony. Please wait....</h4>
            </div>
            <div class="modal-body">

        <form method="POST" action="{{ route('user.testimony.store') }}" class="box-body box-profile mx-5"  enctype="multipart/form-data">
            @csrf

            <div class="form-group row">

                <div class="col-md-6">
                    <label for="testifier_name" class="col-form-label text-md-right">{{ __('testifier_name') }}</label>

                    <input id="testifier_name" type="text" class="form-control @error('testifier_name') is-invalid @enderror" name="testifier_name" value="{{ old('testifier_name') }}" required autocomplete="testifier_name" autofocus>

                    @error('testifier_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="title" class="col-form-label text-md-right">{{ __('title') }}</label>

                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

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

                            <textarea  id="body" type="text" class="form-control @error('body') is-invalid @enderror" name="body" value="{{ old('body') }}" cols="10" rows="4">
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

                    <input id="picture" type="file" class="form-control" name="picture"  >

                    @error('picture')
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


            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-lg pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-lg btn-danger pull-right" style="background-color: #f24; color:#fff; float:center">
                    {{ __('Save') }}
                </button>
            </div>
        </form>
            </div>
            </div>
        <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!--END APPOINTMENT MODAL--->


@endsection


