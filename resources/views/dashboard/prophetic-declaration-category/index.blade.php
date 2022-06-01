@extends('layouts.mainApp')

@section('content')

    <div class="container">
         <!-- About Me Box -->
         <div class="box box-primary p-5">
            <div class="box-header with-border">
                <h3 class="box-title">Prophetic Declaration Dashboard</h3>
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
                    {!! Toastr::message() !!}
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
                                                            <a  data-toggle="modal" data-target="#modal-prophet" class="btn btn-lg bg-primary mx-5" style="background-color:; color: #fffff1"><b>Prophetic Category</b></a>

                                                         </p>

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
                                                                    <th width="10%">
                                                                        <div class="chk-option">
                                                                            <div class="checkbox-fade fade-in-primary">
                                                                                <span >SN</span>
                                                                            </div>
                                                                        </div>
                                                                    </th>

                                                                    <th width=" 60%">DECLARATION TITLE</th>


                                                                    <th width="30%" class="text-right">Action</th>

                                                                </thead>                                                                        Author</th>

                                                                <tbody>

                                                                    @foreach ($declarationCategories as $declarationCategory)

                                                                    <tr style="border: 3px solid red; border-right: 3px solid red">
                                                                        <td>
                                                                        <div class="chk-option">
                                                                            <div class="checkbox-fade fade-in-primary">
                                                                                <label class="check-task" >
                                                                                    <input type="checkbox" value="" style="padding:20px; border: 3px solid red; border-right: 3px solid red">
                                                                                    <span class="cr">
                                                                                                {{  ++$loop->index }}
                                                                                            </span>
                                                                                </label>
                                                                            </div>
                                                                        </div>

                                                                        </td>
                                                                        <td>
                                                                    <div class="d-inline-block align-middle">
                                                                            <div class="d-inline-block">
                                                                                <h6>{{ $declarationCategory->declaration_title }}</h6>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    {{-- <td>
                                                                        {{ Str::words(strtoupper($userManagement->email), $words =3, $end='..') }}
                                                                    </td> --}}

                                                                      <td style="border: 3px solid red; border-right: 3px solid red">


                                                                        <form style="display: inline" action="{{ route('user.declarationCategory.delete', $declarationCategory->id) }}" method="post">
                                                                            <div class="btn-group " style="display: inline">
                                                                                <a style="display: inline; font-style: italic;" class="btn btn-primary btn-round btn-out btn-sm mr-3 " href="{{ route('user.declarationCategory.edit',$declarationCategory->id) }}"><span class="glyphicon glyphicon-pencil btn-round btn-out"></span>_Edit</a>

                                                                                @csrf
                                                                                @method('DELETE')
                                                                                <button style="display: inline; font-style: italic;" type="submit" class=" btn btn-round btn-out btn-sm mr-3 btn-danger btn-round btn-out"><span class="glyphicon glyphicon-trash btn-round btn-out"></span>_Delete</button>
                                                                                <a style="display: inline; font-style: italic; margin-left: 5px" class="btn btn-info btn-round btn-out btn-sm mr-3 p-5" href="{{ route('user.declarationCategory.show',$declarationCategory->id) }}"><span class="glyphicon glyphicon-user btn-round btn-out"></span>_Show</a>

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


                @if ($msg=Session::get('success'))
                <div class="alert alert-success">{{ $msg }}</div>
                @endif

                @if ($msg=Session::get('fail'))
                <div class="alert alert-danger">{{ $msg }}</div>
                @endif


                <!--PROPHET DECLARATION REGISTER MODAL--->
                <div class="modal fade" id="modal-prophet">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" style="font-style: italic; color:#11e060;">Creating New Category. Please wait....</h4>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('user.declarationCategory.store') }}" class="box-body box-profile mx-5"  enctype="multipart/form-data">

                            @csrf




                                            <div class="form-group row">
                                                <div class="col-md-12 col-sm-12, col-xs-12">
                                                    <label for="declaration_title" class="col-form-label text-md-right">{{ __('Declaration title') }}</label>
                                                    {{-- <input id="declaration_title" type="text" class="form-control @error('declaration_title') is-invalid @enderror" name="declaration_title" value="{{ old('declaration_title') }}" required autocomplete="declaration_title" autofocus> --}}
                                                    <textarea name="declaration_title" id="" cols="30" rows="3" class="form-control @error('declaration_title') is-invalid @enderror" name="declaration_title" value="{{ old('declaration_title') }}">
                                                        {{ old('declaration_title') }}
                                                    </textarea>
                                                    @error('declaration_title')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>


                                            </div>


                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger btn-lg pull-left" data-dismiss="modal">Close</button>
                                            {{-- <button type="submit" class=" b-b-primary btn-success btn-round btn btn-out">Create</button> --}}

                                            <button type="submit" class="btn btn-lg btn-success pull-right" style="background-color: #; color:#fff; float:center">
                                                {{ __('Save') }}
                                            </button>
                                        </div>

                                    </div>
                    </form>
                    <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!--END APPOINTMENT MODAL--->








        </div>
    </div>

@endsection


